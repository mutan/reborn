<?php

namespace App\Http\Controllers;

use App\Liquid;
use Session;
use App\Http\Requests\StoreLiquidRequest;

class LiquidController extends Controller
{

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() // liquid
	{
		$liquids = Liquid::all();

		return view('liquids.index', compact('liquids'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() // liquid/create
	{
		return view('liquids.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \App\Http\Requests\StoreLiquidRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreLiquidRequest $request)// liquids
	{
		$liquid = new Liquid( $request->only(['name']) );
		$liquid->save();

		Session::flash('message', 'Запись "' . $liquid->name . '" успешно добавлена');

		return redirect('/liquids');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Liquid  $liquid
	 * @return \Illuminate\Http\Response
	 */
	public function show(Liquid $liquid) // liquids/{liquid}
	{
		abort(404);
		//return view('liquids.show', compact('liquid'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Liquid  $liquid
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Liquid $liquid) // liquids/{liquid}/edit
	{
		return view('liquids.edit', compact('liquid'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\StoreLiquidRequest  $request
	 * @param  \App\Liquid  $liquid
	 * @return \Illuminate\Http\Response
	 */
	public function update(StoreLiquidRequest $request, Liquid $liquid) // liquids/{liquid}
	{
		$liquid->name = $request->name;
		$liquid->save();

		Session::flash('message', 'Запись "' . $liquid->name . '" успешно обновлена');

		return redirect('/liquids');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Liquid  $liquid
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Liquid $liquid) // liquids/{liquid}
	{
		$liquid->delete();

		Session::flash('message', 'Запись "' . $liquid->name . '" успешно удалена');

		return redirect('/liquids');
	}
}
