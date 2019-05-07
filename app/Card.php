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
}
