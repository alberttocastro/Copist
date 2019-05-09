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

Route::get('/', 'MainController@main')->name('home');
Route::get('overview', 'MainController@overview')->name('overview');

Route::prefix('territory')->group(function(){
    
    Route::get('management', 'TerritoryController@management')->name('territory_management');
    Route::post('management/accept','TerritoryController@accept_new_address')->name('accept_address');
    Route::put('management/map', 'TerritoryController@set_map_to_address')->name('set_map_to_address');

    Route::post('suggest', 'TerritoryController@create_suggested_address')->name('create_suggested_address');
    Route::post('report', 'TerritoryController@create_address_report')->name('create_address_report');

    Route::get('{id}', 'TerritoryController@view')->name('view_territory');
});

Route::prefix('assignment')->group(function(){

    Route::get('/','AssignmentController@index')->name('assignments');
});

Route::get('help','MainController@help')->name('help');

Route::prefix('permissions')->group(function(){
    Route::get('/','PermissionsController@index')->name('permissions');
    Route::put('update', 'PermissionsController@update')->name('update_permission');
});
