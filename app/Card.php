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
        return Assignment::where('card_id',$this->id)->whereNull('completion_date')->count() > 0;
    }

    public function get_people_assigned_to_the_card()
    {
        $people = array();
        foreach(Assignment::where('card_id',$this->id)->where('completion_date', null)->get() as $assignment){
            if($assignment->user != null )
            {
                $people[$assignment->id] = $assignment->user;
            } else {
                // Caso o usuário não esteja mais no banco de dados, previne que dê erro
                $user = new App\User;
                $user->name = "Unknown";
                $people[$assignment->id] = $user;
            }
        }
        return $people;
    }

    public function get_assignments_to_card()
    {
        $assignments = array();
        foreach(Assignment::where('card_id',$this->id)->whereNull('completion_date')->get() as $assignment){
            if($assignment->user != null )
            {
                $assignment->user = $assignment->user;
            } else {
                // Caso o usuário não esteja mais no banco de dados, previne que dê erro
                $user = new \App\User;
                $user->name = "Unknown";
                $assignment->user = $user;
            }
            $assignments[] = $assignment;
        }

        return $assignments;
    }
}
