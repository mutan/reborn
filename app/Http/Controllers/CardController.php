<?php

namespace App\Http\Controllers;

use Session;
use App\{Card, Format, Edition, Rarity, Liquid, Element, Supertype, Type, Subtype, Artist};
use App\Http\Requests\StoreCardRequest;

class CardController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('can:moderate-cards', ['except' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Card::with(['edition', 'rarity', 'supertypes', 'types', 'subtypes'])
            ->orderBy('name')
            ->get();

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
        $liquids = Liquid::orderBy('name')->get();
        $elements = Element::orderBy('name')->get();
        $supertypes = Supertype::orderBy('name')->get();
        $types = Type::orderBy('name')->get();
        $subtypes = Subtype::orderBy('name')->get();
        $artists = Artist::orderBy('name')->get();

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
        $data  = $request->only([
            'name', 'image', 'edition_id', 'rarity_id',
            'cost', 'number', 'lives', 'flying', 'movement',
            'power_weak', 'power_medium', 'power_strong',
            'text', 'flavor', 'erratas', 'comments'
        ]);

        $data['flying'] = (bool)$request->get('flying', false);

        $card  = new Card($data);
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
        $card->load(
            'edition.formats', 'rarity', 'liquids', 'elements',
            'supertypes', 'types', 'subtypes', 'artists'
        );

        $formats = Format::get(['id', 'name']);

        return view('cards.show', compact('card', 'formats'));
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
        $liquids = Liquid::orderBy('name')->get();
        $elements = Element::orderBy('name')->get();
        $supertypes = Supertype::orderBy('name')->get();
        $types = Type::orderBy('name')->get();
        $subtypes = Subtype::orderBy('name')->get();
        $artists = Artist::orderBy('name')->get();

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
        $data = $request->only([
            'name', 'image', 'cost', 'number', 'lives', 'flying',
            'edition_id', 'rarity_id',
            'movement', 'power_weak', 'power_medium', 'power_strong',
            'text', 'flavor', 'erratas', 'comments'
        ]);

        // Fields [flying, movement, power_weak, power_medium, power_strong, image] are strings and should be able to be stored to DB as NULLs
        $data['flying'] = (bool)$request->get('flying', false);

        $data['movement'] =
            ( isset($data['movement']) && !empty($data['movement']) ) ? $data['movement'] : NULL;

        $data['power_weak'] =
            ( isset($data['power_weak']) && !empty($data['power_weak']) ) ? $data['power_weak'] : NULL;

        $data['power_medium'] =
            ( isset($data['power_medium']) && !empty($data['power_medium']) ) ? $data['power_medium'] : NULL;

        $data['power_strong'] =
            ( isset($data['power_strong']) && !empty($data['power_strong']) ) ? $data['power_strong'] : NULL;

        $data['image'] =
            ( isset($data['image']) && !empty($data['image']) ) ? $data['image'] : NULL;

        $card->update($data);
        
        $card->artists()->sync($request->artist);
        $card->liquids()->sync($request->liquid);
        $card->elements()->sync($request->element);
        $card->supertypes()->sync($request->supertype);
        $card->types()->sync($request->type);
        $card->subtypes()->sync($request->subtype);

        Session::flash('message', 'Запись "' . $card->name . '" успешно обновлена');

        return redirect('/cards/' . $card->id);
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
