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

Auth::routes();

Route::resource('cards', 'CardController');

// может быть только один: edition, rarity
// может быть несколько: liquids, elements, supertypes, types, subtypes, artists
Route::resource('editions', 'EditionController');
Route::resource('rarities', 'RarityController');

Route::resource('liquids', 'LiquidController');
Route::resource('elements', 'LiquidController');
Route::resource('supertypes', 'LiquidController');
Route::resource('types', 'LiquidController');
Route::resource('subtypes', 'LiquidController');
Route::resource('artists', 'LiquidController');



Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');
