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

Route::resource('editions', 'EditionController');
Route::resource('rarities', 'RarityController');

Route::resource('liquids', 'LiquidController');
Route::resource('elements', 'ElementController');
Route::resource('supertypes', 'SupertypeController');
Route::resource('types', 'TypeController');
Route::resource('subtypes', 'SubtypeController');
Route::resource('artists', 'ArtistController');



Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');
