<?php

namespace App\Http\Controllers;

use App\Artist;
use Session;
use App\Http\Requests\StoreArtistRequest;

class ArtistController extends Controller
{

    public function index()
    {
        $artists = Artist::orderBy('name')->get();

        return view('artists.index', compact('artists'));
    }

    public function create()
    {
        return view('artists.create');
    }

    public function store(StoreArtistRequest $request)
    {
        $artist = new Artist( $request->only(['name']) );
        $artist->save();

        Session::flash('message', 'Запись "' . $artist->name . '" успешно добавлена');

        return redirect('/artists');
    }

    public function show()
    {
        abort(404);
    }

    public function edit(Artist $artist)
    {
        return view('artists.edit', compact('artist'));
    }

    public function update(StoreArtistRequest $request, Artist $artist)
    {
        $artist->name = $request->name;
        $artist->save();

        Session::flash('message', 'Запись "' . $artist->name . '" успешно обновлена');

        return redirect('/artists');
    }

    public function destroy(Artist $artist)
    {
        try {
            $artist->delete();
            Session::flash('message', 'Запись "' . $artist->name . '" успешно удалена');
            return redirect('/artists');
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->withErrors([
                "Удаление невозможно: запись \"" . $artist->name . "\" используется в одной из карт."
            ]);
        }
    }
}
