<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * @return view
     */
    public function main()
    {
        return view("main/index");
    }

    public function help()
    {
        return view('main.help');
    }

    public function overview()
    {
        return view('main.overview');
    }

    public function not_approved()
    {
        return view('denied.not_approved');
    }
}
