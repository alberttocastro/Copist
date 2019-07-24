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

        foreach($this->cards as $card){
            if(Assignment::whereNull('completion_date')->where('card_id', $card->id)->get()->count() == 0){
                array_push($cards,$card);
            }
        }

        return $cards;
    }

    public function addresses_quantity()
    {
        $amount = 0;

        foreach($this->cards as $card){
            $amount += $card->addresses->count();
        }

        return $amount;
    }

    /**
     * Retorna lista de cartões designados ou não designados de acordo com o parâmetro $assigned
     */
    public function cards_report($assigned){
        $return = array();

        foreach($this->cards as $card){
            $card->addresses = $card->addresses;
            $card->assignments = $card->get_assignments_to_card();
            if($card->is_at_work() == $assigned){
                $return[] = $card;
            }
        }

        return $return;
    }

}
