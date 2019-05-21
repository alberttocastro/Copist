<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    //

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
