<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idiom extends Model
{
    //
    public static function from_request($request)
    {
        $idiom = new Idiom;
        $idiom->name = $request->name;
        return $idiom;
    }
}
