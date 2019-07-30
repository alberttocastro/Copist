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
    Route::get('withoutmacroregion', 'API\v1\TerritorryController@cards_without_macro_region');

    Route::get('assignments', 'API\v1\AssignmentController@cards_assignment');

    Route::get('suggestedaddresses', 'API\v1\TerritorryController@suggested_addresses');

    Route::get('publishers', 'API\v1\InformationController@publishers');
    Route::get('macroregions', 'API\v1\InformationController@macro_regions');
    Route::get('cards', 'API\v1\InformationController@cards');
    Route::get('addresstypes', 'API\v1\InformationController@address_types');

    Route::get('users', 'API\v1\AssignmentController@users');
    Route::get('users/available/{card_id}', 'API\v1\AssignmentController@users_for_card');
    Route::post('assignment', 'API\v1\AssignmentController@assign_user_to_card');

    Route::get('idioms', 'API\v1\InformationController@idioms');
    Route::get('nationalities', 'API\v1\InformationController@nationalities');
});
