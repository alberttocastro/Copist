<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;

class Date_parser extends Model
{
    //
    public function from_string_to_datetime(String $string)
    {
        return DateTime::createFromFormat("d/m/Y", $string);
    }
}
