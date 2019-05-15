<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    
}
