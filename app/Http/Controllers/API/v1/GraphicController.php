<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GraphicController extends Controller
{
    public function nationalities()
    {
        $names = [];
        $amount = [];
        foreach (\App\Nationality::all() as $nationality) {
            $names[] = $nationality->name;
            $amount[] = \App\Address::where('nationality_id', $nationality->id)->count();
        }

        $names[] = "-";
        $amount[] = \App\Address::whereNull('nationality_id')->get()->count() + \App\Address::where('nationality_id', 0)->get()->count();

        return [
            'data' => [
                'names' => $names,
                'amount' => $amount
            ]
        ];
    }
}
