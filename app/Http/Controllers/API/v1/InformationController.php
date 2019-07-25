<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InformationController extends Controller
{
    //

    /**
     * Retorna todos os publicadores
     */
    public function publishers()
    {
        return [
            'data' => \App\Publisher::all()
        ];
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

    /**
     * Retorna todos os cartões
     */
    public function cards()
    {
        $cards = array();
        foreach(\App\Card::all() as $card){
            $card->addresses = $card->addresses;
            $cards[] = $card;
        }
        return [
            'data' => $cards
        ];
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

    /**
     * Retorna todos as nacionalidades
     */
    public function nationalities()
    {
        return [
            'data' => \App\Nationality::all()
        ];
    }

    public function idioms()
    {
        return [
            'data' => \App\Idiom::all()
        ];
    }
}
