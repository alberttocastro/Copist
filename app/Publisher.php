<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    //

    public function macro_region()
    {
        return $this->belongsTo('App\Macro_region');
    }

    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function without_user()
    {
        $publishers = array();
        foreach(Publisher::all()->cursor() as $publisher){
            if(User::where('publisher_id', $publisher->id)->count() == 0){
                $publishers->push($publisher->id);
            }
        }

        return Publisher::find($publishers);
    }
}
