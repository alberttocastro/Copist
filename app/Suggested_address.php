<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suggested_address extends Model
{
    protected $fillable = ['neighborhood', 'street', 'name', 'comments'];
}
