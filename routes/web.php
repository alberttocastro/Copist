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

Route::get('/{any}', 'WebAppController@index')->where('any', '^((?!\bapi\b).)*$')->where('path', '.*');

// Rotas de autenticação
Auth::routes();


// Rotas não aprovadas
Route::get('/', 'MainController@main')->name('home')->middleware('auth');
