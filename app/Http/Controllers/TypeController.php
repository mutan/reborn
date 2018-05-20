<?php

namespace App\Http\Controllers;

use App\Type;
use Session;
use App\Http\Requests\StoreTypeRequest;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::orderBy('name')->get();

        return view('types.index', compact('types'));
    }

    public function create()
    {
        return view('types.create');
    }

    public function store(StoreTypeRequest $request)
    {
        $type = new Type( $request->only(['name']) );
        $type->save();

        Session::flash('message', 'Запись "' . $type->name . '" успешно добавлена');

        return redirect('/types');
    }

    public function show()
    {
        abort(404);
    }

    public function edit(Type $type)
    {
        return view('types.edit', compact('type'));
    }

    public function update(StoreTypeRequest $request, Type $type)
    {
        $type->name = $request->name;
        $type->save();

        Session::flash('message', 'Запись "' . $type->name . '" успешно обновлена');

        return redirect('/types');
    }

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
