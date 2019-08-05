<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address_type extends Model
{
    //
    public static function from_request($request)
    {
        $address_type = new Address_type;
        $address_type->name = $request->name;
        return $address_type;
    }
}
