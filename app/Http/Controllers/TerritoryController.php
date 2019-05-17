<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suggested_address;
use App\Date_parser;
use App\Visit;
use App\Address;
use Illuminate\Support\Facades\Gate;

class TerritoryController extends Controller
{
    //

    public function management()
    {
        if (Gate::denies('is_user_admin'))
            return view('denied.permission_not_granted');

        return view('territory.management');
    }

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

    public function accept_new_address(Request $request)
    {
        try {
            $address = new Address;
            $address->street = $request->street;
            $address->neighborhood = $request->neighborhood;
            $address->name = $request->name;
            $address->comments = $request->comments;
            $address->address_type_id = $request->address_type_id;
            $address->macro_region_id = $request->macroregion_id;
            $address->card_id = $request->card_id;
            $address->nationality_id = 0;
            $address->idiom_id = 0;
            $address->second_language_id = 0;
            $address->address_type_id = 0;
            $address->publisher_id=0;
            $address->frequence=0;
            $address->references = "";
            $address->is_valid = true;
            $address->is_visitable = true;

            $address->save();

            $suggested_address = Suggested_address::find($request->suggeste_address_id)->delete();

            return redirect()->action('TerritoryController@management')->with('message', 'Address saved successfully');
        } catch (\Exception $th) {
            return redirect()->action('TerritoryController@management')->with('message', 'Address was not saved. Try again.'.$th);
        }

    }

    public function set_map_to_address(Request $request)
    {
        try {
            $address = Address::find($request->address_id);
            $address->card_id = $request->address_id;

            $address->save();

            return redirect()->action('TerritoryController@management')->with('message', 'Card set successfully');
        } catch (\Exception $th) {
            return redirect()->action('TerritoryController@management')->with('message', 'Card could not be set. Try again.');
        }
    }

    public function edit()
    {
        return view('territory.edit');
    }

    public function update(Request $request)
    {
        $address = App\Address::find($request->id);

        $address->street = $request->street;
        $address->neighborhood = $request->neighborhood;
        $address->name = $request->name;
        $address->comments = $request->comments;
        $address->address_type_id = $request->address_type_id;
        $address->macro_region_id = $request->macroregion_id;
        $address->card_id = $request->card_id;
        $address->nationality_id = 0;
        $address->idiom_id = 0;
        $address->second_language_id = 0;
        $address->address_type_id = 0;
        $address->publisher_id=0;
        $address->frequence=0;
        $address->references = "";
        $address->is_valid = true;
        $address->is_visitable = true;

        if (Gate::denies('is_user_admin'))
            return view('denied.permission_not_granted');

        $address->save();

        return redirect()->route('view_territory', ['id'=>$request->id]);
    }
}
