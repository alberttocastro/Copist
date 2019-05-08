<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //

    public function is_visited(){
        return $this->publisher_id != "0";
    }

    public function card()
    {
        return $this->belongsTo('App\Card');
    }

    public function nationality()
    {
        return $this->belongsTo('App\Nationality');
    }

    public function idiom()
    {
        return $this->belongsTo('App\Idiom');
    }

    public function second_idiom()
    {
        return $this->belongsTo('App\Idiom', 'second_language_id');
    }

    public function address_type(){
        return $this->belongsTo('App\Address_type');
    }

    public function publisher(){
        return $this->belongsTo('App\Publisher');
    }

    public function macro_region(){
        return $this->belongsTo('App\Macro_region');
    }
}
