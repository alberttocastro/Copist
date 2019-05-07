<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    //

    public function macro_region()
    {
        return $this->belongsTo('App\Macro_region');
    }

    public function group()
    {
        return $this->belongsTo('App\Group');
    }
}
