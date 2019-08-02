<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    // TODO: Trocar designação de usuário para publicador

    public function card()
    {
        return $this->belongsTo('App\Card');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
