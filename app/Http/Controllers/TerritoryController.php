<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suggested_address;

class TerritoryController extends Controller
{
    //

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
}
