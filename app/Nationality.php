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

    public static function from_request($request)
    {
        $nationality = new Nationality;
        $nationality->name = $request->name;
        return $nationality;
    } 
}
