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

// liquids, elements, supertypes, types, subtypes, rarities, artists, editions

Route::resource('cards', 'CardController');
Route::resource('liquids', 'LiquidController');






Route::get('/', function () {
    return view('liquid.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
