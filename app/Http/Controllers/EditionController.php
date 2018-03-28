<?php

namespace App\Http\Controllers;

use App\Edition;
use Session;
use App\Http\Requests\StoreEditionRequest;

class EditionController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$editions = Edition::all();

		return view('editions.index', compact('editions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('editions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\StoreEditionRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreEditionRequest $request)
	{
		$edition = new Edition( $request->only(['name', 'image', 'code', 'quantity', 'description']) );
		$edition->save();

		Session::flash('message', 'Запись "' . $edition->name . '" успешно добавлена');

		return redirect('/editions');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Edition  $edition
	 * @return \Illuminate\Http\Response
	 */
	public function show(Edition $edition)
	{
		abort(404);
		//return view('editions.show', compact('edition'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Edition  $edition
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Edition $edition)
	{
		return view('editions.edit', compact('edition'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\StoreEditionRequest  $request
	 * @param  \App\Edition  $edition
	 * @return \Illuminate\Http\Response
	 */
	public function update(StoreEditionRequest $request, Edition $edition)
	{
		$edition->name = $request->name;
		$edition->image = $request->image;
		$edition->code = $request->code;
		$edition->quantity = $request->quantity;
		$edition->description = $request->description;
		$edition->save();

		Session::flash('message', 'Запись "' . $edition->name . '" успешно обновлена');

		return redirect('/editions');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Edition  $edition
	 * @return \Illuminate\Http\Response
	 */
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
