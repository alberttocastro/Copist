<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InformationController extends Controller
{
    /**
     * Retorna todos os publicadores
     */
    public function publishers()
    {
        return [
            'data' => \App\Publisher::all()
        ];
    }

    public function create_publisher(Request $request)
    {
        $publisher = \App\Publisher::from_request($request);
        $publisher->save();
    }

    /**
     * Retorna todas as Macro-regiões
     */
    public function macro_regions()
    {
        return [
            'data' => \App\Macro_region::all()
        ];
    }

    public function create_macro_region(Request $request)
    {
        \App\Macro_region::create($request);
    }

    public function update_macro_region(Request $request, $id)
    {
        \App\Macro_region::find($id)->update($request);
    }

    public function destroy_macro_region($id)
    {
        if(\App\Card::where('macro_region_id', $id)->count() == 0)
            \App\Macro_region::find($id)->delete();
    }

    /**
     * Retorna todos os tipos de endereços
     */
    public function address_types()
    {
        return [
            'data' => \App\Address_type::all()
        ];
    }

    public function create_address_type(Request $request)
    {
        \App\Address_type::from_request($request)->save();
    }

    /**
     * Retorna todos as nacionalidades
     */
    public function nationalities()
    {
        return [
            'data' => \App\Nationality::all()
        ];
    }

    public function create_nationality(Request $request)
    {
        \App\Nationality::from_request($request)->save();
    }

    public function idioms()
    {
        return [
            'data' => \App\Idiom::all()
        ];
    }

    public function create_idiom(Request $request)
    {
        \App\Idiom::from_request($request)->save();
    }
}
