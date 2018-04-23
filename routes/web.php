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

Route::get('/', 'MainpageController@index')->name('mainpage');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::resource('decks', 'DeckController');
//Route::get('decks/{id}/cards', 'DeckController@cards');

/* Cards routes */
/* Gate 'access-cards' applies to CardController in its constructor, except 'show' method */
Route::resource('cards', 'CardController');
Route::middleware('can:access-cards')->group(function () {
	Route::resource('formats', 'FormatController');
	Route::resource('editions', 'EditionController');
	Route::resource('rarities', 'RarityController');
	Route::resource('liquids', 'LiquidController');
	Route::resource('elements', 'ElementController');
	Route::resource('supertypes', 'SupertypeController');
	Route::resource('types', 'TypeController');
	Route::resource('subtypes', 'SubtypeController');
	Route::resource('artists', 'ArtistController');
});

/* Search routes */
Route::get('/search/autocomplete', 'SearchController@autocomplete');
Route::get('/search', 'SearchController@simple');
Route::get('/search/advanced', 'SearchController@advanced');
Route::get('/search/show', 'SearchController@show');
