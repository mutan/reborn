<?php

namespace App\Http\Controllers;

use App\Liquid;
use Session;
use Illuminate\Http\Request;

class LiquidController extends Controller
{

    /**
     * Validation rules.
     *
     * @var array
     */
    protected $rules = [
        'name' => 'required|unique:liquids|max:50',
    ];

    /**
     * Validation error messages.
     *
     * @var array
     */
    protected $messages = [
        'required' => 'Это поле не может быть пустым.',
        'unique' => 'Введенное название уже существует.',
        'max' => 'Максимум 50 символов.',            
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() // liquid
    {
        $liquids = Liquid::all();

        return view('liquids.index', compact('liquids'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() // liquid/create
    {
        return view('liquids.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // liquid
    {
        $request->validate($this->rules, $this->messages);

        $liquid = new Liquid( $request->only(['name']) );
        $liquid->save();

        Session::flash('message', 'Запись "' . $liquid->name . '" успешно добавлена');

        return redirect('/liquid');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Liquid  $liquid
     * @return \Illuminate\Http\Response
     */
    public function show(Liquid $liquid) // liquid/{liquid}
    {
        return view('liquids.show', compact('liquid'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Liquid  $liquid
     * @return \Illuminate\Http\Response
     */
    public function edit(Liquid $liquid) // liquid/{liquid}/edit
    {
        return view('liquids.edit', compact('liquid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Liquid  $liquid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Liquid $liquid) // liquid/{liquid}
    {
        $request->validate($this->rules, $this->messages);

        $liquid->name = $request->name;
        $liquid->save();

        Session::flash('message', 'Запись "' . $liquid->name . '" успешно обновлена');

        return redirect('/liquid');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Liquid  $liquid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Liquid $liquid) // liquid/{liquid}
    {
        $liquid->delete();

        Session::flash('message', 'Запись "' . $liquid->name . '" успешно удалена');

        return redirect('/liquid');
    }
}
