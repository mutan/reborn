<?php

namespace App\Http\Controllers;

use App\Liquid;
use Session;
use App\Http\Requests\StoreLiquidRequest;

class LiquidController extends Controller
{
	public function index() // liquid
	{
		$liquids = Liquid::orderBy('name')->get();

		return view('liquids.index', compact('liquids'));
	}

	public function create() // liquid/create
	{
		return view('liquids.create');
	}

	public function store(StoreLiquidRequest $request)// liquids
	{
		$liquid = new Liquid( $request->only(['name', 'image']) );
		$liquid->save();

		Session::flash('message', 'Запись "' . $liquid->name . '" успешно добавлена');

		return redirect('/liquids');
	}

	public function show(Liquid $liquid) // liquids/{liquid}
	{
		abort(404);
	}

	public function edit(Liquid $liquid) // liquids/{liquid}/edit
	{
		return view('liquids.edit', compact('liquid'));
	}

	public function update(StoreLiquidRequest $request, Liquid $liquid) // liquids/{liquid}
	{
		$liquid->name = $request->name;
		$liquid->image = $request->image;
		$liquid->save();

		Session::flash('message', 'Запись "' . $liquid->name . '" успешно обновлена');

		return redirect('/liquids');
	}

	public function destroy(Liquid $liquid) // liquids/{liquid}
	{
		try {
			$liquid->delete();
			Session::flash('message', 'Запись "' . $liquid->name . '" успешно удалена');
			return redirect('/liquids');
		} catch (\Illuminate\Database\QueryException $e) {
			return back()->withErrors([
				"Удаление невозможно: запись \"" . $liquid->name . "\" используется в одной из карт."
			]);
		}
	}
}
