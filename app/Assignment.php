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

    /**
     * Cria uma designação com base no id do usuário e do cartão
     */
    public static function assign($user_id, $card_id)
    {
        $assignment = new Assignment;
        $assignment->card_id = $card_id;
        $assignment->user_id = $user_id;
        return $assignment;
    }
}
