<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suggested_address;
use App\Date_parser;
use App\Visit;
use App\Address;

class TerritoryController extends Controller
{
    //

    public function view($id)
    {
        $address = Address::find((int)$id);
        return view('territory.view', ['address'=>$address]);
    }

    public function create_suggested_address(Request $request)
    {
        $suggested_address = new Suggested_address;
        $suggested_address->neighborhood = $request->input('neighborhood');
        $suggested_address->street = $request->input('street');
        $suggested_address->name = $request->input('name');
        $suggested_address->comments = $request->input('comments');

        $suggested_address->save();

        return redirect()->route('home')->with('message', 'Suggested address created successfully');
    }

    public function create_address_report(Request $request)
    {
        $parser = new Date_parser;
        $date = $parser->from_string_to_datetime($request->date);

        if($date != false)
        {
            $visit = new Visit;
            $visit->publisher_id = (int)$request->publisher_id;
            $visit->address_id = (int)$request->address_id;
            $visit->visit_date = $date;
            $visit->comment = $request->comment;

            $visit->save();

            return redirect()->route('home')->with('message', 'Report successfully saved');
                        
        } else
        {
            return redirect()->route('home')->with('message', 'Couldn\'t parse date');
        }

    }
}
