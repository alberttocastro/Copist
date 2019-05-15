<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use App\Publisher;
use App\Macro_region;
use App\Address_type;
use App\Idiom;
use App\Nationality;

class DatabaseController extends Controller
{
    //
    public function db_service()
    {
        if (Gate::allows('is_user_admin'))
            return view('main.db_service');

        return view('denied.not_approved');
    }

    public function db_public()
    {
        if (Gate::allows('is_user_admin'))
            return view('main.db_public');
        
        return view('denied.not_approved');
    }
    
    public function create_card(Request $request)
    {
        $card = new Card;
        $card->name = $request->name;
        $card->macro_region_id = $request->macro_region;
        try {
            //code...
            $card->save();
        } catch (\Throwable $th) {
            return redirect()->action('DatabaseController@db_service')->with('message','Not possible');
        }

        return redirect()->action('DatabaseController@db_service')->with('message','Saved successfully');
    }

    public function create_publisher(Request $request)
    {
        $publisher = new Publisher;
        $publisher->name = $request->name;
        $publisher->phone = $request->phone;
        $publisher->neighborhood = $request->neighborhood;
        $publisher->macro_region_id = $request->macro_region;

        try{
            $publisher->save();
        } catch (\Throwable $th) {
            return redirect()->action('DatabaseController@db_service')->with('message','Not possible');
        }

        return redirect()->action('DatabaseController@db_service')->with('message','Saved successfully');
    }

    public function create_macro_region(Request $request)
    {
        $macro_region = new Macro_region;
        $macro_region->name = $request->name;

        try{
            $macro_region->save();
        } catch (\Throwable $th) {
            return redirect()->action('DatabaseController@db_service')->with('message','Not possible');
        }

        return redirect()->action('DatabaseController@db_service')->with('message','Saved successfully');
    }

    public function create_address_type(Request $request)
    {
        $address_type = new Address_type;
        $address_type->name = $request->name;

        try{
            $address_type->save();
        } catch (\Throwable $th) {
            return redirect()->action('DatabaseController@db_service')->with('message','Not possible');
        }

        return redirect()->action('DatabaseController@db_service')->with('message','Saved successfully');
    }

    public function create_idiom(Request $request)
    {
        $idiom = new Idiom;
        $idiom->name = $request->name;

        try{
            $idiom->save();
        } catch (\Throwable $th) {
            return redirect()->action('DatabaseController@db_public')->with('message','Not possible');
        }

        return redirect()->action('DatabaseController@db_public')->with('message','Saved successfully');
    }

    public function create_nationality(Request $request)
    {
        $nationality = new Nationality;
        $nationality->name = $request->name;

        try{
            $nationality->save();
        } catch (\Throwable $th) {
            return redirect()->action('DatabaseController@db_public')->with('message','Not possible');
        }

        return redirect()->action('DatabaseController@db_public')->with('message','Saved successfully');
    }
}
