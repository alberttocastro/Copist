<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Card;
use App\Macro_region;

class AssignmentController extends Controller
{
    /**
     * Retorna os cartões de território informando em array se estão designados ou não-designados.
     */
    public function cards_assignment()
    {
        $assigned_cards = array();
        $unassigned_cards = array();

        foreach (Macro_region::all() as $macro_region) {
            $macro_region_assigned_territories = array();
            $macro_region_assigned_territories = $macro_region->cards_report(true);

            if (\count($macro_region_assigned_territories) > 0) {
                $mr = clone $macro_region;
                $mr->assignment_cards = $macro_region_assigned_territories;
                
                $assigned_cards[] = clone $mr;
            }

            $macro_region_unassigned_territories = array();
            $macro_region_unassigned_territories = $macro_region->cards_report(false);

            if (\count($macro_region_unassigned_territories) > 0) {
                $mr = clone $macro_region;
                $mr->assignment_cards = $macro_region_unassigned_territories;
                
                $unassigned_cards[] = clone $mr;
            }
        }

        return [
            'data' => [
                'assigned' => $assigned_cards,
                'unassigned' => $unassigned_cards
            ]
        ];
    }

    /**
     * Retorna todos os usuários cadastrados e aprovados
     */
    public function users()
    {
        $data = array();
        foreach (\App\User::approved_users() as $user) {
            $user->publisher = $user->publisher;
            $data[] = $user;
        }
        return [
            'data' => $data
        ];
    }

    /**
     * Retorna todos os usuários que ainda não foram designados para um cartão
     */
    public function users_for_card(Request $request)
    {
        $data = array();
        foreach (\App\User::approved_users() as $user) {
            if (\App\Assignment::where('card_id', $request->card_id)->where('user_id', $user->id)->whereNull('completion_date')->get()->count() == 0) {
                $user->publisher = $user->publisher;
                $data[] = $user;
            }
        }

        return [
            'data' => $data
        ];
    }

    public function assign_user_to_card(Request $request)
    {
        foreach ($request->publishers as $user_id) {
            \App\Assignment::assign($user_id, $request->card_id)->save();
        }
    }

    /**
     * Remove todas as designações do cartão
     */
    public function finish_card_assignments(Request $request)
    {
        \App\Card::find($request->card_id)->finish_assignments();
    }
}
