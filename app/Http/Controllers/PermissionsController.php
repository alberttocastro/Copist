<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\User;

class PermissionsController extends Controller
{
    //
    public function index(){
        if (Gate::denies('is_user_admin')) 
            return view('denied.permission_not_granted');
            
        return view('permission.index');
    }

    public function update(Request $request){

        //Pega da requisição todas as entradas que são estritamente dados
        foreach($request->except(['_method','_token']) as $key => $value){
            if(gettype((int)$key) == "integer"){
                $user = User::find($key);
                $user->publisher_id = $value;

                $user->save();
            }
        }

        return redirect()->action('PermissionsController@index');
    }
}
