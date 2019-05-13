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
Route::get('/unapproved','MainController@not_approved')->middleware('auth');

// Rotas protegidas pelo sistema
Route::middleware(['auth', 'approved'])->group(function(){
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
    
        Route::post('set', 'AssignmentController@assign_to_territory')->name('assign_to_territory');
        Route::delete('remove', 'AssignmentController@remove_assignment')->name('remove_assignment_to_territory');
    });
    
    Route::get('help','MainController@help')->name('help');
    
    Route::prefix('permissions')->group(function(){
        Route::get('/','PermissionsController@index')->name('permissions');
        Route::put('update', 'PermissionsController@update')->name('update_permission');
    });
});

