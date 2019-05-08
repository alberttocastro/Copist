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
Route::post('territory/suggest', 'TerritoryController@create_suggested_address')->name('create_suggested_address');
Route::post('territory/report', 'TerritoryController@create_address_report')->name('create_address_report');