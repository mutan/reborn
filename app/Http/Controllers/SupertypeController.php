<?php

namespace App\Http\Controllers;

use App\Supertype;
use Session;
use App\Http\Requests\StoreSupertypeRequest;

class SupertypeController extends Controller
{
    public function index()
    {
        $supertypes = Supertype::orderBy('name')->get();

        return view('supertypes.index', compact('supertypes'));
    }

    public function create()
    {
        return view('supertypes.create');
    }

    public function store(StoreSupertypeRequest $request)
    {
        $supertype = new Supertype( $request->only(['name']) );
        $supertype->save();

        Session::flash('message', 'Запись "' . $supertype->name . '" успешно добавлена');

        return redirect('/supertypes');
    }

    public function show()
    {
        abort(404);
    }

    public function edit(Supertype $supertype)
    {
        return view('supertypes.edit', compact('supertype'));
    }

    public function update(StoreSupertypeRequest $request, Supertype $supertype)
    {
        $supertype->name = $request->name;
        $supertype->save();

        Session::flash('message', 'Запись "' . $supertype->name . '" успешно обновлена');

        return redirect('/supertypes');
    }

    public function destroy(Supertype $supertype)
    {
        try {
            $supertype->delete();
            Session::flash('message', 'Запись "' . $supertype->name . '" успешно удалена');
            return redirect('/supertypes');
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->withErrors([
                "Удаление невозможно: запись \"" . $supertype->name . "\" используется в одной из карт."
            ]);
        }
    }
}
