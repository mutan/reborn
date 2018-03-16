<?php

namespace App\Http\Controllers;

use App\Artist;
use Session;
use App\Http\Requests\StoreArtistRequest;

class ArtistController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artists = Artist::all();

        return view('artists.index', compact('artists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArtistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArtistRequest $request)
    {
         $artist = new Artist( $request->only(['name']) );
        $artist->save();

        Session::flash('message', 'Запись "' . $artist->name . '" успешно добавлена');

        return redirect('/artists');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {
        abort(404);
        //return view('artists.show', compact('artist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function edit(Artist $artist)
    {
        return view('artists.edit', compact('artist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreArtistRequest  $request
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(StoreArtistRequest $request, Artist $artist)
    {
        $artist->name = $request->name;
        $artist->save();

        Session::flash('message', 'Запись "' . $artist->name . '" успешно обновлена');

        return redirect('/artists');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
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
