<?php

namespace App\Http\Controllers;

use Session;
use App\Card;
use App\Edition;
use App\Rarity;
use App\Liquid;
use App\Element;
use App\Supertype;
use App\Type;
use App\Subtype;
use App\Artist;
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
        $cards = Card::with(['edition', 'rarity', 'supertypes', 'types', 'subtypes'])->get();

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
        $liquids = Liquid::all();
        $elements = Element::all();
        $supertypes = Supertype::all();
        $types = Type::all();
        $subtypes = Subtype::all();
        $artists = Artist::all();

        return view('cards.create', compact('editions', 'rarities', 'liquids', 'elements', 'supertypes', 'types', 'subtypes', 'artists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCardRequest $request)
    {
        $card  = new Card( $request->only([
            'name', 'image', 'edition_id', 'rarity_id', 'cost', 'number', 'lives', 'movement', 'power_weak', 'power_medium', 'power_strong', 'text', 'flavor', 'erratas', 'comments'
        ]) );
        $card->save();
        $card->artists()->sync($request->artist);
        $card->liquids()->sync($request->liquid);
        $card->elements()->sync($request->element);
        $card->supertypes()->sync($request->supertype);
        $card->types()->sync($request->type);
        $card->subtypes()->sync($request->subtype);

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
        $card->load('edition', 'rarity', 'liquids', 'elements', 'supertypes', 'types', 'subtypes', 'artists');

        return view('cards.show', compact('card'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        $card->load('edition', 'rarity', 'liquids', 'elements', 'supertypes', 'types', 'subtypes', 'artists');

        $editions = Edition::all();
        $rarities = Rarity::all();
        $liquids = Liquid::all();
        $elements = Element::all();
        $supertypes = Supertype::all();
        $types = Type::all();
        $subtypes = Subtype::all();
        $artists = Artist::all();

        return view('cards.edit', compact('card', 'editions', 'rarities', 'liquids', 'elements', 'supertypes', 'types', 'subtypes', 'artists'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreCardRequest  $request
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCardRequest $request, Card $card)
    {
        $card->update($request->only([
            'name', 'image', 'edition_id', 'rarity_id', 'cost', 'number', 'lives', 'movement', 'power_weak', 'power_medium', 'power_strong', 'text', 'flavor', 'erratas', 'comments'
        ]));
        $card->artists()->sync($request->artist);
        $card->liquids()->sync($request->liquid);
        $card->elements()->sync($request->element);
        $card->supertypes()->sync($request->supertype);
        $card->types()->sync($request->type);
        $card->subtypes()->sync($request->subtype);

        Session::flash('message', 'Запись "' . $card->name . '" успешно обновлена');

        return redirect('/cards');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        $card->delete();

        Session::flash('message', 'Запись "' . $card->name . '" успешно удалена');

        return redirect('/cards');
    }
}
