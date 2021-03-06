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
    public function assignments()
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

    public function create_assignment(Request $request)
    {
        //TODO: Implementar retorno de designação criada
        foreach ($request->publishers as $user_id) {
            if (\count(\App\Assignment::where('user_id', $user_id)->where('card_id', $request->card_id)->whereNull('completion_date')->get()) == 0) {
                \App\Assignment::assign($user_id, $request->card_id)->save();
            }
        }
    }

    /**
     * Remove todas as designações do cartão
     */
    public function finish_assignments(Request $request, $id)
    {
        \App\Card::find($id)->finish_assignments();
    }

    public function finish_assignment($id)
    {
        \App\Assignment::find($id)->finish();
    }

    public function user_assignments($id)
    {
        return [
            'data' => \App\Assignment::with("card.addresses")->where('user_id', $id)->whereNull('completion_date')->where('card_id', "!=", 0)->get()
        ];
    }
}
