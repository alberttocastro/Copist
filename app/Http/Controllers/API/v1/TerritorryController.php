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
        Log::info($request);

        $address = new \App\Address;
        $address->fill($request->toArray());

        if ($address->save() && $request->suggested_address_id != null)
            \App\Suggested_address::find($request->suggested_address_id)->delete();

        return [
            'data' => \App\Address::find($address->id)
        ];
    }

    public function update_address(Request $request, $id)
    {
        Log::info(["id" => $id, "request" => $request->toArray()]);
        $address = \App\Address::find($id);
        $address->update($request->toArray());
        return [
            'data' => $address
        ];
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
        $suggested_address = \App\Suggested_address::create($request->toArray());
        return [
            'data' => \App\Suggested_address::find($suggested_address->id)
        ];
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
        $request['address_id'] = $request->address_id;
        $request['publisher_id'] = request()->user()->publisher_id;
        $visit = new \App\Visit;
        $visit->fill($request->toArray());
        $visit->save();
        return [
            'data' => \App\Visit::find($visit->id)
        ];
    }
}
