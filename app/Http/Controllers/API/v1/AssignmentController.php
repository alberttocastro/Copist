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
            $macro_region_assigned_cards = $macro_region->cards_report(true);
            $macro_region_unassigned_cards = $macro_region->cards_report(false);

            if (\count($macro_region_assigned_cards) > 0) {
                $macro_region->cards = $macro_region_assigned_cards;
                $assigned_cards[] = $macro_region;
            }
            if (\count($macro_region_unassigned_cards) > 0) {
                $macro_region->cards = $macro_region_unassigned_cards;
                $unassigned_cards[] = $macro_region;
            }
        }


        return [
            'data' => [
                'assigned' => $assigned_cards,
                'unassigned' => $unassigned_cards
            ]
        ];
    }
}
