<?php

namespace App\Http\Controllers;

use App\Rarity;
use Session;
use App\Http\Requests\StoreRarityRequest;

class RarityController extends Controller
{
	public function index()
	{
		$rarities = Rarity::all();

		return view('rarities.index', compact('rarities'));
	}

	public function create()
	{
		return view('rarities.create');
	}

	public function store(StoreRarityRequest $request)
	{
		$rarity = new Rarity( $request->only(['name', 'image']) );
		$rarity->save();

		Session::flash('message', 'Запись "' . $rarity->name . '" успешно добавлена');

		return redirect('/rarities');
	}

	public function show()
	{
		abort(404);
	}

	public function edit(Rarity $rarity)
	{
		return view('rarities.edit', compact('rarity'));
	}

	public function update(StoreRarityRequest $request, Rarity $rarity)
	{
		$rarity->name = $request->name;
		$rarity->image = $request->image;
		$rarity->save();

		Session::flash('message', 'Запись "' . $rarity->name . '" успешно обновлена');

		return redirect('/rarities');
	}

	public function destroy(Rarity $rarity)
	{
		try {
			$rarity->delete();
			Session::flash('message', 'Запись "' . $rarity->name . '" успешно удалена');
			return redirect('/rarities');
		} catch (\Illuminate\Database\QueryException $e) {
			return back()->withErrors([
				"Удаление невозможно: запись \"" . $rarity->name . "\" используется в одной из карт."
			]);
		}
	}
}
