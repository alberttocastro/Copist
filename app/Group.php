<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //

    public function conductor()
    {
        return $this->belongsTo('App\Publisher', 'conductor_id');
    }

    public function helper()
    {
        return $this->belongsTo('App\Publisher', 'helper_id');
    }
}
