<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    protected $fillable = ['name'];

    public function addresses()
    {
        return $this->hasMany('App\Address');
    }
}
