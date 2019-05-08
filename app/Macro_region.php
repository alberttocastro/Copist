<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Macro_region extends Model
{
    //

    public function cards(){
        return $this->hasMany('App\Card');
    }

    /**
     * Cartões não designados são os que todas as suas designações estão completas,
     *  isto é, tem data de término
     */
    public function unassigned_cards(){
        
        $cards = array();

        foreach($this->cards as $id => $card){
            if(Assignment::where('card_id', $id)->where('completion_date','')->count() == 0){
                $cards[$id] = $card;
            }
        }

        return $cards;
    }
}
