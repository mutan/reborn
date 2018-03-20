<?php

namespace App\Http\Controllers;

use App\Rarity;
use Session;
use App\Http\Requests\StoreRarityRequest;

class RarityController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$rarities = Rarity::all();

		return view('rarities.index', compact('rarities'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('rarities.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\StoreRarityRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreRarityRequest $request)
	{
		$rarity = new Rarity( $request->only(['name']) );
		$rarity->save();

		Session::flash('message', 'Запись "' . $rarity->name . '" успешно добавлена');

		return redirect('/rarities');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Rarity  $rarity
	 * @return \Illuminate\Http\Response
	 */
	public function show(Rarity $rarity)
	{
		abort(404);
		//return view('rarities.show', compact('rarity'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Rarity  $rarity
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Rarity $rarity)
	{
		return view('rarities.edit', compact('rarity'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\StoreRarityRequest  $request
	 * @param  \App\Rarity  $rarity
	 * @return \Illuminate\Http\Response
	 */
	public function update(StoreRarityRequest $request, Rarity $rarity)
	{
		$rarity->name = $request->name;
		$rarity->save();

		Session::flash('message', 'Запись "' . $rarity->name . '" успешно обновлена');

		return redirect('/rarities');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Rarity  $rarity
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Rarity $rarity)
	{
		try {
			$rarity->delete();
			Session::flash('message', 'Запись "' . $rarity->name . '" успешно удалена');
			return redirect('/raritys');
		} catch (\Illuminate\Database\QueryException $e) {
			return back()->withErrors([
				"Удаление невозможно: запись \"" . $rarity->name . "\" используется в одной из карт."
			]);
		}
	}
}
