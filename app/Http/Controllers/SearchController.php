<?php

namespace App\Http\Controllers;

use App\Card;
use App\Edition;
use App\Rarity;
use App\Liquid;
use App\Element;
use App\Supertype;
use App\Type;
use App\Subtype;
use App\Artist;
use Illuminate\Http\Request;

class SearchController extends Controller
{
	/**
	 * Autocomplite search field
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function autocomplete(Request $request)
	{
		if( null == $request->input('term') ) {
			abort(400, 'Неверный запрос.');
		}

		$term = $request->input('term');

		$cards = Card::where('name', 'LIKE', '%'.$term.'%')
		->take(5)->pluck('name')->toArray();

		return response()->json($cards);
	}

	/**
	 * Search and show results
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$request->flash();

		$editions = Edition::all();
		$rarities = Rarity::all();
		$liquids = Liquid::all();
		$elements = Element::all();
		$supertypes = Supertype::all();
		$types = Type::all();
		$subtypes = Subtype::all();
		$artists = Artist::all();
		
		if( null == $request->input('name') ) {
			return view('search.index', compact('editions'));
		}

		$cards = Card::where('name', 'LIKE', '%'. $request->input('name') .'%')
			->when($request->input('edition_id'), function ($query) use ($request) {
				return $query->where('edition_id', $request->input('edition_id'));
			})
			->orderBy('name')->get();



		return view(
			'search.index',
			compact('cards', 'editions', 'rarities', 'liquids', 'elements', 'supertypes', 'types', 'subtypes', 'artists')
		);
	}
}
