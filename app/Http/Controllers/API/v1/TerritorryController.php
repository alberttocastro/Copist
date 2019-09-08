<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Macro_region;
use App\Address;
use Illuminate\Support\Facades\Log;

class TerritorryController extends Controller
{
    public $BLANK_ID = '';
    /**
     * Retorna todos os endereços que estão relacionados a um mapa.
     * Envie o parâmetro 'card = false' para ter todos os endereços sem cartão
     * Envie o parâmetro 'suggested = true' para ter todos os endereços sugeridos
     */
    public function addresses()
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
        ];
    }

    public function addresses_no_card()
    {
        $data = [];
        foreach (Address::where('card_id', 0)->get() as $address) {
            $data[] = $address;
        }
        return [
            'data' => $data,
        ];
    }

    public function address($id)
    {
        return new \App\Http\Resources\Address(\App\Address::with('visits.publisher')->find($id));
    }

    /**
     * Cria um novo endereço. E se tiver um endereço sugerido, deleta
     */
    public function create_address(Request $request)
    {
        $array = $request->toArray();
        Log::info($array);
        $array['is_visitable'] = (bool) $request->is_visitable;
        $array['is_valid'] = true;
        $array['publisher_id'] = 0;
        $array['frequence'] = 0;
        $array['second_language_id'] = 0;
        Log::info($array);

        if (\App\Address::create($array) && $request->suggested_address_id != null)
            \App\Suggested_address::find($request->suggested_address_id)->delete();
    }

    public function update_address(Request $request, $id)
    {
        $request_array = $request->toArray();
        array_key_exists("is_visitable", $request_array)
            ? $request_array['is_visitable'] = (bool) $request_array['is_visitable']
            : $request_array['is_visitable'] = false;
        array_key_exists("is_valid", $request_array)
            ? $request_array['is_valid'] = (bool) $request_array['is_valid']
            : $request_array['is_valid'] = false;

        \App\Address::find($id)->update($request_array);
    }

    public function destroy_address($id)
    {
        \App\Address::find($id)->delete();
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

    public function create_suggested_address(Request $request)
    {
        \App\Suggested_address::create($request->toArray());
    }

    // Para aceitar um suggested_addres, use a ação de criar um endereço
    public function reject_suggested_address($id)
    {
        \App\Suggested_address::find($id)->delete();
    }

    /**
     * Retorna todos os cartões.
     * Envie 'macro_region = false' nos parâmetros para retornar cartões sem macro região
     */
    public function cards()
    {
        $cards = array();
        foreach (\App\Card::all() as $card) {
            $card->addresses = $card->addresses;
            $cards[] = $card;
        }
        return [
            'data' => $cards
        ];
    }

    public function cards_no_macro_region()
    {
        return [
            'data' => \App\Card::without_macro_region()
        ];
    }

    public function create_card(Request $request)
    {
        \App\Card::create($request->toArray());
    }

    public function update_card(Request $request, $id)
    {
        \App\Card::find($id)->update($request->toArray());
    }

    public function destroy_card($id)
    {
        \App\Card::find($id)->delete();
    }


    /**
     * Retorna todos os cartões que estão sem Macro-região
     */
    public function cards_without_macro_region()
    {
        $card = new \App\Card;
    }

    /**
     * Adiciona novo relatório de visita ao endereço
     */
    public function report_visit(Request $request)
    {
        $request['publisher_id'] = request()->user()->publisher_id;
        return [
            'data' => [
                'visit' => \App\Visit::create($request->toArray())
            ]
        ];
    }
}
