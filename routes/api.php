<?php

use Illuminate\Http\Request;
use App\Http\Resources\MacroRegionCollection as Resource;
use App\Macro_region;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('api', function (){
    $data = [];
    foreach(Macro_region::all() as $macro_region){        
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
});
