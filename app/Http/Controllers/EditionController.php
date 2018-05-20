<?php

namespace App\Http\Controllers;

use Session;
use App\Edition;
use App\Http\Requests\StoreEditionRequest;

class EditionController extends Controller
{

	public function index()
	{
		$editions = Edition::all();

		return view('editions.index', compact('editions'));
	}

	public function create()
	{
		return view('editions.create');
	}

	public function store(StoreEditionRequest $request)
	{
		$edition = new Edition( $request->only(['name', 'number', 'image', 'code', 'quantity', 'description']) );
		$edition->save();

		Session::flash('message', 'Запись "' . $edition->name . '" успешно добавлена');

		return redirect('/editions');
	}

	public function show()
	{
		abort(404);
	}

	public function edit(Edition $edition)
	{
		return view('editions.edit', compact('edition'));
	}

	public function update(StoreEditionRequest $request, Edition $edition)
	{
		$edition->name = $request->name;
		$edition->number = $request->number;
		$edition->image = $request->image;
		$edition->code = $request->code;
		$edition->quantity = $request->quantity;
		$edition->description = $request->description;
		$edition->save();

		Session::flash('message', 'Запись "' . $edition->name . '" успешно обновлена');

		return redirect('/editions');
	}

	public function destroy(Edition $edition)
	{
		try {
			$edition->delete();
			Session::flash('message', 'Запись "' . $edition->name . '" успешно удалена');
			return redirect('/editions');
		} catch (\Illuminate\Database\QueryException $e) {
			return back()->withErrors([
				"Удаление невозможно: запись \"" . $edition->name . "\" используется в одной из карт."
			]);
		}
	}
}
