<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Macro_region;

class TerritorryController extends Controller
{
    /**
     * Display a listing of the resource.
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
            'data' => $data
        ];
    }
}
