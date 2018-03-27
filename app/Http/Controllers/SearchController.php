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
			->take(5)->orderBy('name')->pluck('name')->toArray();

		return response()->json($cards);
	}

	/**
	 * Search and show results
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function simple(Request $request)
	{
		if( null != $request->input('name') ) {
			$cards = Card::where('name', 'LIKE', '%'. $request->input('name') .'%')
				->with(['edition'])
				->orderBy('name')
				->paginate(12)
				->appends($request->except('page'));
		}

		return view('search.simple', compact('cards'));
	}

	/**
	 * Advanced search form
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function advanced()
	{
		$editions = Edition::all();
		$rarities = Rarity::all();
		$liquids = Liquid::orderBy('name')->get();
		$elements = Element::orderBy('name')->get();
		$supertypes = Supertype::orderBy('name')->get();
		$types = Type::orderBy('name')->get();
		$subtypes = Subtype::orderBy('name')->get();
		$artists = Artist::orderBy('name')->get();

		return view(
			'search.advanced',
			compact('editions', 'rarities', 'liquids', 'elements', 'supertypes', 'types', 'subtypes', 'artists')
		);
	}

	/**
	 * Show advanced search results
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function show(Request $request)
	{
		if ( count($request->all()) > 0 ) {

			$view = $request->input('view');

			$cards = Card::
				/* name */
				when($request->input('name'), function ($query) use ($request) {
					return $query->where('name', 'LIKE', '%'. $request->input('name') .'%');
				})

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
					return $query->where('cost', $request->input('cost-op'), $request->input('cost'));
				})

				/* lives */
				->when($request->input('cost'), function ($query) use ($request) {
					return $query->where('cost', $request->input('cost-op'), $request->input('cost'));
				})

				/* movement */
				->when($request->input('cost'), function ($query) use ($request) {
					return $query->where('cost', $request->input('cost-op'), $request->input('cost'));
				})

				/* power_weak */
				->when($request->input('cost'), function ($query) use ($request) {
					return $query->where('cost', $request->input('cost-op'), $request->input('cost'));
				})

				/* power_medium */
				->when($request->input('cost'), function ($query) use ($request) {
					return $query->where('cost', $request->input('cost-op'), $request->input('cost'));
				})

				/* power_strong */
				->when($request->input('cost'), function ($query) use ($request) {
					return $query->where('cost', $request->input('cost-op'), $request->input('cost'));
				})

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
				->paginate(24)
				->appends($request->except('page'));
		}

		return view('search.show',compact('cards', 'view'));
	}
}
