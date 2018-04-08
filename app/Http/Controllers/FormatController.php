<?php

namespace App\Http\Controllers;

use Session;
use App\Format;
use App\Edition;
use App\Http\Requests\StoreFormatRequest;

class FormatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $formats = Format::with(['editions'])
            ->orderBy('id')
            ->get();

        return view('formats.index', compact('formats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $editions = Edition::orderBy('id')->get();
        return view('formats.create', compact('editions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFormatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFormatRequest $request)
    {
        $format = new Format( $request->only(['name', 'description']) );
        $format->save();
        $format->editions()->sync($request->edition);

        Session::flash('message', 'Запись "' . $format->name . '" успешно добавлена');

        return redirect('/formats');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Format  $format
     * @return \Illuminate\Http\Response
     */
    public function show(Format $format)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Format  $format
     * @return \Illuminate\Http\Response
     */
    public function edit(Format $format)
    {
        $editions = Edition::orderBy('id')->get();

        return view('formats.edit', compact('format', 'editions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreFormatRequest  $request
     * @param  \App\Format  $format
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFormatRequest $request, Format $format)
    {
        $format->name = $request->name;
        $format->description = $request->description;
        $format->save();
        $format->editions()->sync($request->edition);

        Session::flash('message', 'Запись "' . $format->name . '" успешно обновлена');

        return redirect('/formats');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Format  $format
     * @return \Illuminate\Http\Response
     */
    public function destroy(Format $format)
    {
        try {
            $format->delete();
            Session::flash('message', 'Запись "' . $format->name . '" успешно удалена');
            return redirect('/formats');
        } catch (\Illuminate\Database\QueryException $e) {
            return back()->withErrors([
                "Удаление невозможно: запись \"" . $format->name . "\" используется в одной из карт."
            ]);
        }
    }
}
