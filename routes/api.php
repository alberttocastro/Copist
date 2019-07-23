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


Route::prefix('v1')->group(function(){
    Route::get('territorries', 'API\v1\TerritorryController@territories');
    Route::get('withoutmap', 'API\v1\TerritorryController@addresses_without_map');
});
