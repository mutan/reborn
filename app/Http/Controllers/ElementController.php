<?php

namespace App\Http\Controllers;

use App\Element;
use Session;
use App\Http\Requests\StoreElementRequest;

class ElementController extends Controller
{
    public function index()
    {
        $elements = Element::orderBy('name')->get();

        return view('elements.index', compact('elements'));
    }

    public function create()
    {
        return view('elements.create');
    }

    public function store(StoreElementRequest $request)
    {
        $element = new Element( $request->only(['name', 'image']) );
        $element->save();

        Session::flash('message', 'Запись "' . $element->name . '" успешно добавлена');

        return redirect('/elements');
    }

    public function show()
    {
        abort(404);
    }

    public function edit(Element $element)
    {
        return view('elements.edit', compact('element'));
    }

    public function update(StoreElementRequest $request, Element $element)
    {
        $element->name = $request->name;
        $element->image = $request->image;
        $element->save();

        Session::flash('message', 'Запись "' . $element->name . '" успешно обновлена');

        return redirect('/elements');
    }

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
