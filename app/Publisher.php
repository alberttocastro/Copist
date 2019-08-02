<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    //

    /**
     * Retorna um objeto criado a partir de uma requisição
     */
    public static function from_request($request){
        $publisher = new Publisher;
        $publisher->name = $request->name;
        $publisher->email = $request->email;
        $publisher->neighborhood = $request->neighborhood;
        $publisher->phone = $request->phone;
        $publisher->macro_region_id = $request->macro_region_id;
        
        return $publisher;
    }

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
