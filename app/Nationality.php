<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    //

    public function addresses()
    {
        return $this->hasMany('App\Address');
    }
}
