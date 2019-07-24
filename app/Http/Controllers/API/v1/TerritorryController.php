<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Macro_region;
use App\Address;

//TODO: Mudar de territorry pra territory
class TerritorryController extends Controller
{
    public $BLANK_ID = '';
    /**
     * Retorna todos os territórios que estão relacionados a um mapa
     *
     * @return \Illuminate\Http\Response
     */
    public function territories()
    {
        $data = [];
        foreach (Macro_region::all() as $macro_region) {
            $data[] = [
                'id' => $macro_region->id,
                'name' => $macro_region->name,
                'amount' => $macro_region->addresses_quantity(),
                'cards' => $macro_region->cards
            ];
        };
        return [
            'data' => $data,
            'meta' => [
                'links' => [
                    'address' => [
                        'edit' => route('edit_territory', ['id' => $this->BLANK_ID])
                    ]
                ]
            ]
        ];
    }

    /**
     * Retorna todos os endereços que não pertencem a nenhum cartão
     */
    public function addresses_without_map()
    { 
        $data = [];
        foreach(Address::where('card_id', 0)->get() as $address){
            $data[] = $address;
        }
        return [
            'data' => $data,
            'meta' => [
                'links' => [
                    'address' => [
                        'edit' => route('edit_territory', ['id' => $this->BLANK_ID])
                    ]
                ]
            ]
        ];
    }

    /**
     * Retorna todos os endereços sugeridos pelos publicadores
     */
    public function suggested_addresses()
    {
        return [
            'data' => \App\Suggested_address::All()->toArray()
        ];
    }
}
