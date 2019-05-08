<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    //
    public function macro_region()
    {
        return $this->belongsTo('App\Macro_region');
    }

    public function addresses()
    {
        return $this->hasMany('App\Address');
    }

    public function is_at_work()
    {
        return Assignment::where('card_id',$this->id).count() > 0;
    }

    public function get_people_assigned_to_the_card()
    {
        $people = array();
        foreach(Assignment::where('card_id',$this->id).where('completion_date', '') as $assignment){
            $people[$assignment->id] = $assignment->user;
        }
        return $people;
    }
}
