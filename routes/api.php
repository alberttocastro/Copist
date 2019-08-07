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
    Route::get('addresses', function(Request $request){
        $territorry_controller = new \App\Http\Controllers\API\v1\TerritorryController;
        
        if($request->has('suggested') && $request->suggested === 'true'){
            return $territorry_controller->suggested_addresses();
        }
        
        if($request->has('card') && $request->card === 'false'){
            return $territorry_controller->addresses_no_card();
        }
        
        return $territorry_controller->addresses();
    });
    Route::get('addresses/{id}', 'API\v1\TerritorryController@address');
    Route::post('addresses', 'API\v1\TerritorryController@create_address');
    Route::put('addresses/{id}', 'API\v1\TerritorryController@update_address');
    Route::delete('addresses/{id}', 'API\v1\TerritorryController@destroy_address');
    
    Route::get('cards', function(Request $request){
        $territorry_controller = new \App\Http\Controllers\API\v1\TerritorryController;

        if($request->has('macro_region') && $request->macro_region)
            return $territorry_controller->cards_no_macro_region();
        
        return $territorry_controller->cards();
    });
    Route::post('cards', 'API\v1\TerritorryController@create_card');
    Route::put('cards/{id}', 'API\v1\TerritorryController@update_card');
    Route::delete('cards/{id}', 'API\v1\TerritorryController@update_card');
    
    Route::get('cards/{id}/users', 'API\v1\AssignmentController@users_for_card');
    Route::delete('cards/{id}/assignments', 'API\v1\AssignmentController@finish_assignments');
    
    Route::get('macroregions', 'API\v1\InformationController@macro_regions');
    Route::post('macroregions', 'API\v1\InformationController@create_macro_region');
    Route::put('macroregions/{id}', 'API\v1\InformationController@update_macro_region');
    Route::delete('macroregions/{id}', 'API\v1\InformationController@destroy_macro_region');
    
    Route::get('assignments', 'API\v1\AssignmentController@assignments');
    Route::post('assignments', 'API\v1\AssignmentController@create_assignment');
    
    Route::get('publishers', 'API\v1\InformationController@publishers');
    Route::post('publishers', 'API\v1\InformationController@create_publisher');
    Route::put('publishers/{id}', 'API\v1\InformationController@update_publisher');
    Route::delete('publishers/{id}', 'API\v1\InformationController@destroy_publisher');
    
    Route::get('addresstypes', 'API\v1\InformationController@address_types');
    Route::post('addresstypes', 'API\v1\InformationController@create_address_type');
    Route::put('addresstypes/{id}','API\v1\InformationController@update_address_type');
    Route::delete('addresstypes/{id}','API\v1\InformationController@destroy_address_type');

    Route::get('users', 'API\v1\AssignmentController@users');

    Route::get('idioms', 'API\v1\InformationController@idioms');
    Route::post('idioms', 'API\v1\InformationController@create_idiom');
    Route::put('idioms/{id}', 'API\v1\InformationController@update_idiom');
    Route::delete('idioms/{id}', 'API\v1\InformationController@destroy_idiom');

    Route::get('nationalities', 'API\v1\InformationController@nationalities');
    Route::post('nationalities', 'API\v1\InformationController@create_nationality');
    Route::put('nationalities/{id}', 'API\v1\InformationController@update_nationality');
    Route::delete('nationalities/{id}', 'API\v1\InformationController@destroy_nationality');
});
