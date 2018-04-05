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

		$cards = Card::where('name', 'LIKE', '%'. $request->input('term') .'%')
			->distinct()
			->take(5)
			->orderBy('name')
			->pluck('name')
			->toArray();

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
		$cards = Card::where('name', 'LIKE', '%'. $request->input('name') .'%')
			->with(['edition'])
			->orderBy('name')
			->paginate(24)
			->appends($request->except('page'));

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

		$cost = Card::orderBy('cost')->distinct()->pluck('cost')->toArray();
		$lives = Card::orderBy('lives')->distinct()->pluck('lives')->toArray();
		$movement = Card::orderBy('movement')->distinct()->pluck('movement')->toArray();
		$power_weak = Card::orderBy('power_weak')->distinct()->pluck('power_weak')->toArray();	
		$power_medium = Card::orderBy('power_medium')->distinct()->pluck('power_medium')->toArray();	
		$power_strong = Card::orderBy('power_strong')->distinct()->pluck('power_strong')->toArray();	

		return view(
			'search.advanced',
			compact('editions', 'rarities', 'liquids', 'elements', 'supertypes', 'types', 'subtypes', 'artists', 'cost', 'lives', 'movement', 'power_weak', 'power_medium', 'power_strong')
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

		//dd( $request->input('power_weak') );

		if ( count($request->all()) > 0 ) {

			$view = $request->input('view');

			$cards = Card::
				/* name */
				when($request->has('name'), function ($query) use ($request) {
					return $query->where('name', 'LIKE', '%'. $request->input('name') .'%');
				})

				/* edition */	
				->when($request->has('edition_id'), function ($query) use ($request) {
					return $query->where('edition_id', $request->input('edition_id'));
				})

				/* number */
				->when($request->has('number'), function ($query) use ($request) {
					return $query->where('number', $request->input('number'));
				})

				/* rarity */
				->when($request->has('rarity_id'), function ($query) use ($request) {
					return $query->where('rarity_id', $request->input('rarity_id'));
				})

				/* liquids */
				->when($request->has('liquids'), function ($query) use ($request) {
					return $query->whereHas('liquids', function ($query) use ($request) {
							return $query->whereIn('liquid_id', $request->input('liquids'));
						});
				})

				/* elements */
				->when($request->has('elements'), function ($query) use ($request) {
					return $query->whereHas('elements', function ($query) use ($request) {
							return $query->whereIn('element_id', $request->input('elements'));
						});
				})

				// I really can't think of anything better
				/* supertypes */
				->when($request->has('supertypes'), function ($query) use ($request) {

					return $query->whereHas('supertypes', function ($query) use ($request) {
							return $query->whereIn('supertype_id', $request->input('supertypes'));
						})

						->when( in_array(0, $request->input('supertypes') ), function ($query) use ($request) {
							return $query->orWhereDoesntHave('supertypes');
						});
				})

				/* types */
				->when($request->has('types'), function ($query) use ($request) {
					return $query->whereHas('types', function ($query) use ($request) {
							return $query->whereIn('type_id', $request->input('types'));
						});
				})

				/* subtypes */
				->when($request->has('subtypes'), function ($query) use ($request) {
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
				->when($request->has('cost'), function ($query) use ($request) {
					return $query->where('cost', $request->input('cost-op'), $request->input('cost'));
				})

				/* lives */
				->when($request->has('lives'), function ($query) use ($request) {
					return $query->where('lives', $request->input('lives-op'), $request->input('lives'));
				})

				/* movement */
				->when($request->has('movement'), function ($query) use ($request) {
					return $query->where('movement', $request->input('movement-op'), $request->input('movement'));
				})

				/* power_weak */
				->when($request->has('power_weak'), function ($query) use ($request) {
					return $query->where(
						'power_weak', $request->input('power_weak-op'), $request->input('power_weak')
					);
				})

				/* power_medium */
				->when($request->has('power_medium'), function ($query) use ($request) {
					return $query->where(
						'power_medium', $request->input('power_medium-op'), $request->input('power_medium')
					);
				})

				/* power_strong */
				->when($request->has('power_strong'), function ($query) use ($request) {
					return $query->where(
						'power_strong', $request->input('power_strong-op'), $request->input('power_strong')
					);
				})

				/* text */
				->when($request->has('text'), function ($query) use ($request) {
					return $query->where('text', 'LIKE', '%'. $request->input('text') .'%');
				})

				/* flavor */
				->when($request->has('flavor'), function ($query) use ($request) {
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
