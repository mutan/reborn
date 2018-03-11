<?php

namespace App\Http\Controllers;

use Session;
use App\Card;
use App\Edition;
use App\Rarity;
use App\Liquid;
use App\Element;
use App\Artist;
use App\Supertype;
use App\Type;
use App\Subtype;
use App\Http\Requests\StoreCardRequest;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Card::all();

        return view('cards.index', compact('cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $editions = Edition::all();
        $rarities = Rarity::all();
        $artists = Artist::all();

        return view('cards.create', compact('editions', 'rarities', 'artists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCardRequest $request)
    {
        //dd($request->all());

        $card  = new Card( $request->only([
            'name', 'image', 'edition_id', 'rarity_id', 'cost', 'number', 'lives', 'movement', 'power_weak', 'power_medium', 'power_strong', 'text', 'flavor', 'erratas', 'comments'
        ]) );
        $card->save();
        $card->artists()->sync($request->artist);

        Session::flash('message', 'Запись "' . $card->name . '" успешно добавлена');

        return redirect('/cards');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreCardRequest  $request
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        //
    }
}
