<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $fillable = ['name', 'email', 'neighborhood', 'phone', 'macro_region_id'];

    public function macro_region()
    {
        return $this->belongsTo('App\Macro_region');
    }

    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public static function without_user($selected_publisher = 0)
    {
        $publishers = array();
        foreach(Publisher::all() as $publisher){
            if(User::where('publisher_id', $publisher->id)->count() == 0){
                array_push($publishers, $publisher->id);
            }
        }

        if($selected_publisher != 0){
            array_push($publishers, $selected_publisher);
        }

        return Publisher::find($publishers);
    }
}
