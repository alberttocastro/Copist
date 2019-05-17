<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Rotas de autenticação
Auth::routes();

// Rotas não aprovadas
Route::get('/', 'MainController@main')->name('home')->middleware('auth');

// Rotas protegidas pelo sistema
Route::middleware(['auth', 'approved'])->group(function(){

    Route::get('overview', 'MainController@overview')->name('overview');

    Route::prefix('territory')->group(function(){

        Route::get('management', 'TerritoryController@management')->name('territory_management');
        Route::post('management/accept','TerritoryController@accept_new_address')->name('accept_address');
        Route::put('management/map', 'TerritoryController@set_map_to_address')->name('set_map_to_address');

        Route::post('suggest', 'TerritoryController@create_suggested_address')->name('create_suggested_address');
        Route::post('report', 'TerritoryController@create_address_report')->name('create_address_report');

        Route::get('{id}', 'TerritoryController@view')->name('view_territory');

        Route::get('/edit/{id}', 'TerritoryController@edit')->name('edit_territory');
        Route::put('/edit/{id}', 'TerritoryController@upadate')->name('update_territory');
    });

    Route::prefix('assignment')->group(function(){

        Route::get('/','AssignmentController@index')->name('assignments');

        Route::post('set', 'AssignmentController@assign_to_territory')->name('assign_to_territory');
        Route::delete('remove', 'AssignmentController@remove_assignment')->name('remove_assignment_to_territory');
    });

    Route::get('help','MainController@help')->name('help');

    Route::prefix('permissions')->group(function(){
        Route::get('/','PermissionsController@index')->name('permissions');
        Route::put('update', 'PermissionsController@update')->name('update_permission');
    });

    Route::prefix('/database')->group(function(){
        Route::prefix('service')->group(function(){
            Route::get('/', 'DatabaseController@db_service')->name('db_service');

            Route::post('publisher', 'DatabaseController@create_publisher')->name('create_publisher');
            Route::post('card', 'DatabaseController@create_card')->name('create_card');
            Route::post('address_type', 'DatabaseController@create_address_type')->name('create_address_type');
            Route::post('macro_region', 'DatabaseController@create_macro_region')->name('create_macro_region');
        });

        Route::prefix('public')->group(function(){
            Route::get('/', 'DatabaseController@db_public')->name('db_public');

            Route::post('idiom', 'DatabaseController@create_idiom')->name('create_idiom');
            Route::post('nationality', 'DatabaseController@create_nationality')->name('create_nationality');
        });
    });
});

