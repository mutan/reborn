<?php

namespace App\Http\Controllers;

use App\Type;
use Session;
use App\Http\Requests\StoreTypeRequest;

class TypeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();

        return view('types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeRequest $request)
    {
        $type = new Type( $request->only(['name']) );
        $type->save();

        Session::flash('message', 'Запись "' . $type->name . '" успешно добавлена');

        return redirect('/types');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        abort(404);
        //return view('types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        return view('types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreTypeRequest  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTypeRequest $request, Type $type)
    {
        $type->name = $request->name;
        $type->save();

        Session::flash('message', 'Запись "' . $type->name . '" успешно обновлена');

        return redirect('/types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        try {
            $type->delete();
            Session::flash('message', 'Запись "' . $type->name . '" успешно удалена');
            return redirect('/types');
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->withErrors([
                "Удаление невозможно: запись \"" . $type->name . "\" используется в одной из карт."
            ]);
        }
    }
}
