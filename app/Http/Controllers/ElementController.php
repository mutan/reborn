<?php

namespace App\Http\Controllers;

use App\Element;
use Session;
use App\Http\Requests\StoreElementRequest;

class ElementController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $elements = Element::all();

        return view('elements.index', compact('elements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('elements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreElementRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreElementRequest $request)
    {
        $element = new Element( $request->only(['name', 'image']) );
        $element->save();

        Session::flash('message', 'Запись "' . $element->name . '" успешно добавлена');

        return redirect('/elements');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Element  $element
     * @return \Illuminate\Http\Response
     */
    public function show(Element $element)
    {
        abort(404);
        //return view('elements.show', compact('element'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Element $element
     * @return \Illuminate\Http\Response
     */
    public function edit(Element $element)
    {
        return view('elements.edit', compact('element'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreElementRequest  $request
     * @param  \App\Element  $element
     * @return \Illuminate\Http\Response
     */
    public function update(StoreElementRequest $request, Element $element)
    {
        $element->name = $request->name;
        $element->image = $request->image;
        $element->save();

        Session::flash('message', 'Запись "' . $element->name . '" успешно обновлена');

        return redirect('/elements');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Element  $element
     * @return \Illuminate\Http\Response
     */
    public function destroy(Element $element)
    {
        try {
            $element->delete();
            Session::flash('message', 'Запись "' . $element->name . '" успешно удалена');
            return redirect('/elements');
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->withErrors([
                "Удаление невозможно: запись \"" . $element->name . "\" используется в одной из карт."
            ]);
        }
    }
}
