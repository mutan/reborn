<?php

namespace App\Http\Controllers;

use Session;
use App\{Card, Format, Edition, Rarity, Liquid, Element, Supertype, Type, Subtype, Artist};
use App\Http\Requests\StoreCardRequest;

class CardController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:moderate-cards', ['except' => ['show']]);
    }

    public function index()
    {
        $cards = Card::with(['edition', 'rarity', 'supertypes', 'types', 'subtypes'])
            ->orderBy('number')
            ->get();

        return view('cards.index', compact('cards'));
    }

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

    public function store(StoreCardRequest $request)
    {
        $data  = $request->only([
            'name', 'image', 'edition_id', 'rarity_id',
            'cost', 'number', 'lives', 'flying', 'movement',
            'power_weak', 'power_medium', 'power_strong',
            'text', 'flavor', 'erratas', 'comments'
        ]);

        $data['flying'] = (bool)$request->input('flying', false);

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

    public function show(Card $card)
    {
        $card->load(
            'edition.formats', 'rarity', 'liquids', 'elements',
            'supertypes', 'types', 'subtypes', 'artists'
        );

        $formats = Format::get(['id', 'name']);

        return view('cards.show', compact('card', 'formats'));
    }

    public function edit(Card $card)
    {
        $card->load(
          'edition', 'rarity', 'liquids', 'elements',
          'supertypes', 'types', 'subtypes', 'artists'
        );

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

    public function update(StoreCardRequest $request, Card $card)
    {

      //dd($request->input('movement'));

       $data = $request->only([
            'name', 'image', 'cost', 'number', 'lives', 'flying',
            'edition_id', 'rarity_id',
            'movement', 'power_weak', 'power_medium', 'power_strong',
            'text', 'flavor', 'erratas', 'comments'
        ]);

        // Fields [flying, movement, power_weak, power_medium, power_strong, image] are strings
        // and should be able to be stored to DB as NULLs
        $data['flying'] = (bool)$request->input('flying', false);
        $data['movement'] = $request->input('movement');
        $data['power_weak'] = $request->input('power_weak');
        $data['power_medium'] = $request->input('power_medium');
        $data['power_strong'] = $request->input('power_strong');
        $data['image'] = $request->input('image');

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

    public function destroy(Card $card)
    {
        $card->delete();

        Session::flash('message', 'Запись "' . $card->name . '" успешно удалена');

        return redirect('/cards');
    }
}
