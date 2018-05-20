<?php

namespace App\Http\Controllers;

use App\Subtype;
use Session;
use App\Http\Requests\StoreSubtypeRequest;

class SubtypeController extends Controller
{
    public function index()
    {
        $subtypes = Subtype::orderBy('name')->get();

        return view('subtypes.index', compact('subtypes'));
    }

    public function create()
    {
        return view('subtypes.create');
    }

    public function store(StoreSubtypeRequest $request)
    {
        $subtype = new Subtype( $request->only(['name']) );
        $subtype->save();

        Session::flash('message', 'Запись "' . $subtype->name . '" успешно добавлена');

        return redirect('/subtypes');
    }

    public function show()
    {
        abort(404);
    }

    public function edit(Subtype $subtype)
    {
        return view('subtypes.edit', compact('subtype'));
    }

    public function update(StoreSubtypeRequest $request, Subtype $subtype)
    {
        $subtype->name = $request->name;
        $subtype->save();

        Session::flash('message', 'Запись "' . $subtype->name . '" успешно обновлена');

        return redirect('/subtypes');
    }

    public function destroy(Subtype $subtype)
    {
        try {
            $subtype->delete();
            Session::flash('message', 'Запись "' . $subtype->name . '" успешно удалена');
            return redirect('/subtypes');
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->withErrors([
                "Удаление невозможно: запись \"" . $subtype->name . "\" используется в одной из карт."
            ]);
        }
    }
}
