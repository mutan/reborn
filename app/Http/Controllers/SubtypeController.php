<?php

namespace App\Http\Controllers;

use App\Subtype;
use Session;
use App\Http\Requests\StoreSubtypeRequest;

class SubtypeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subtypes = Subtype::all();

        return view('subtypes.index', compact('subtypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subtypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubtypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubtypeRequest $request)
    {
        $subtype = new Subtype( $request->only(['name']) );
        $subtype->save();

        Session::flash('message', 'Запись "' . $subtype->name . '" успешно добавлена');

        return redirect('/subtypes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subtype  $subtype
     * @return \Illuminate\Http\Response
     */
    public function show(Subtype $subtype)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subtype  $subtype
     * @return \Illuminate\Http\Response
     */
    public function edit(Subtype $subtype)
    {
        return view('subtypes.edit', compact('subtype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubtypeRequest  $request
     * @param  \App\Subtype  $subtype
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSubtypeRequest $request, Subtype $subtype)
    {
        $subtype->name = $request->name;
        $subtype->save();

        Session::flash('message', 'Запись "' . $subtype->name . '" успешно обновлена');

        return redirect('/subtypes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subtype  $subtype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subtype $subtype)
    {
        $subtype->delete();

        Session::flash('message', 'Запись "' . $subtype->name . '" успешно удалена');

        return redirect('/subtypes');
    }
}
