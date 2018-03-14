<?php

namespace App\Http\Controllers;

use App\Supertype;
use Session;
use App\Http\Requests\StoreSupertypeRequest;

class SupertypeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supertypes = Supertype::all();

        return view('supertypes.index', compact('supertypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supertypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSupertypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSupertypeRequest $request)
    {
        $supertype = new Supertype( $request->only(['name']) );
        $supertype->save();

        Session::flash('message', 'Запись "' . $supertype->name . '" успешно добавлена');

        return redirect('/supertypes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supertype  $supertype
     * @return \Illuminate\Http\Response
     */
    public function show(Supertype $supertype)
    {
        abort(404);
        //return view('supertypes.show', compact('supertype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supertype  $supertype
     * @return \Illuminate\Http\Response
     */
    public function edit(Supertype $supertype)
    {
        return view('supertypes.edit', compact('supertype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreSupertypeRequest  $request
     * @param  \App\Supertype  $supertype
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSupertypeRequest $request, Supertype $supertype)
    {
        $supertype->name = $request->name;
        $supertype->save();

        Session::flash('message', 'Запись "' . $supertype->name . '" успешно обновлена');

        return redirect('/supertypes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supertype  $supertype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supertype $supertype)
    {
        $supertype->delete();

        Session::flash('message', 'Запись "' . $supertype->name . '" успешно удалена');

        return redirect('/supertypes');
    }
}
