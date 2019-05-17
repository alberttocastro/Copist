<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
        return view('main.overview');
    }

    public function not_approved()
    {
        return view('denied.not_approved');
    }

}
