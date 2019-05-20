<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Address;
use App\Nationality;

class MainController extends Controller
{
    /**
     * @return view
     */
    public function main()
    {
        if (Gate::allows('is_user_approved'))
            return view("main.index");

        return view('denied.not_approved');
    }

    public function help()
    {
        return view('main.help');
    }

    public function overview()
    {
        $nationality_names = array();
        $nationality_quantities = array();
        $nationality_colors = array();

        foreach(Nationality::all() as $nationality)
        {
            array_push($nationality_names, $nationality->name);
            array_push($nationality_quantities, $nationality->addresses->count());
            array_push($nationality_colors, "rgba(".rand(0,256).",".rand(0,256).",".rand(0,256).","."0.2");
        }

        return view('main.overview')
                    ->with('nationality_quantities', json_encode($nationality_quantities))
                    ->with('nationality_names', json_encode($nationality_names))
                    ->with('nationality_colors', json_encode($nationality_colors));
    }

    public function not_approved()
    {
        return view('denied.not_approved');
    }

}
