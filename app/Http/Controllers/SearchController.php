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
		if(! null == $request->input('name') ) {
			$cards = Card::where('name', 'LIKE', '%'. $request->input('name') .'%')
				->with(['edition'])
				->orderBy('name')
				->paginate(12)
				->appends($request->except('page'));
		}

		return view('search.index', compact('cards'));
	}

	/**
	 * Advanced search and show results
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function advanced(Request $request)
	{
		// 	dd( $request->input('supertypes') );

		$request->flash();

		$editions = Edition::all();
		$rarities = Rarity::all();
		$liquids = Liquid::all();
		$elements = Element::all();
		$supertypes = Supertype::all();
		$types = Type::all();
		$subtypes = Subtype::all();
		$artists = Artist::all();

		$cards = Card::where('name', 'LIKE', '%'. $request->input('name') .'%')
			/* name */

			/* edition */	
			->when($request->input('edition_id'), function ($query) use ($request) {
				return $query->where('edition_id', $request->input('edition_id'));
			})

			/* number */
			->when($request->input('number'), function ($query) use ($request) {
				return $query->where('number', $request->input('number'));
			})

			/* rarity */
			->when($request->input('rarity_id'), function ($query) use ($request) {
				return $query->where('rarity_id', $request->input('rarity_id'));
			})

			/* liquids */
			->when($request->input('liquids'), function ($query) use ($request) {
				return $query->whereHas('liquids', function ($query) use ($request) {
						return $query->whereIn('liquid_id', $request->input('liquids'));
					});
			})

			/* elements */
			->when($request->input('elements'), function ($query) use ($request) {
				return $query->whereHas('elements', function ($query) use ($request) {
						return $query->whereIn('element_id', $request->input('elements'));
					});
			})

			// I really can't think of anything better
			/* supertypes */
			->when($request->input('supertypes'), function ($query) use ($request) {

				return $query->whereHas('supertypes', function ($query) use ($request) {
						return $query->whereIn('supertype_id', $request->input('supertypes'));
					})

					->when( in_array(0, $request->input('supertypes') ), function ($query) use ($request) {
						return $query->orWhereDoesntHave('supertypes');
					});
			})

			/* types */
			->when($request->input('types'), function ($query) use ($request) {
				return $query->whereHas('types', function ($query) use ($request) {
						return $query->whereIn('type_id', $request->input('types'));
					});
			})

			/* subtypes */
			->when($request->input('subtypes'), function ($query) use ($request) {
				return $query->whereHas('subtypes', function ($query) use ($request) {
						return $query->whereIn('subtype_id', $request->input('subtypes'));
					});
			})

			/* artists */
			->when($request->input('artists'), function ($query) use ($request) {
				return $query->whereHas('artists', function ($query) use ($request) {
						return $query->whereIn('artist_id', $request->input('artists'));
					});
			})

			/* cost */
			->when($request->input('cost'), function ($query) use ($request) {

				//dd( $request->input('cost-condition') );
				return $query->where('cost', $request->input('cost-condition'), $request->input('cost'));
			})


			/* lives */

			/* movement */

			/* power_weak */

			/* power_medium */

			/* power_strong */

			/* text */
			->when($request->input('text'), function ($query) use ($request) {
				return $query->where('text', 'LIKE', '%'. $request->input('text') .'%');
			})

			/* flavor */
			->when($request->input('flavor'), function ($query) use ($request) {
				return $query->where('flavor', 'LIKE', '%'. $request->input('flavor') .'%');
			})

			->with(['edition', 'rarity', 'supertypes', 'types', 'subtypes'])
			->orderBy('name')
			->get();

		return view(
			'search.advanced',
			compact('cards', 'editions', 'rarities', 'liquids', 'elements', 'supertypes', 'types', 'subtypes', 'artists')
		);
	}
}
