<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = [
        'address_id', 'publisher_id', 'visit_date', 'comment'
    ];

    public function address()
    {
        return $this->belongsTo('App\Address');
    }

    public function publisher()
    {
        return $this->belongsTo('App\Publisher');
    }

    public function date()
    {
        $date = \DateTime::createFromFormat("Y-m-d", $this->visit_date);
        return $date;
    }
}
