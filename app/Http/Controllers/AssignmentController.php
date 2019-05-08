<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;

class AssignmentController extends Controller
{
    //
    public function index()
    {
        $working_cards = array();
        $cards = Card::all();
        foreach($cards as $id => $card){
            if($card->is_at_work()){
                if(\array_key_exists($card->macro_region_id, $working_cards)){
                    $macro_region_array = $working_cards[$card->macro_region_id];
                } else {
                    $macro_region_array = array();
                }
                $macro_region_array[$card->id] = $card;
                $working_cards[$card->macro_region_id] = $macro_region_array;
            }
        }
        return view('main.assignments',['working_cards'=>$working_cards]);
    }
}
