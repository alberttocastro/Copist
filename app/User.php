<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Retrieve information about people not to call
     *
     * @return model
     */
    public function do_not_call_info(){
        // TODO: Pegar de maneira dinâmica
        return Address::where('is_valid', 1)
                            ->where('is_visitable', 0)
                            ->get();
    }

    public function publisher()
    {
        return $this->belongsTo('App\Publisher');
    }

    public static function approved_users()
    {
        return User::where('publisher_id', '>', 0)->get();
    }
}
