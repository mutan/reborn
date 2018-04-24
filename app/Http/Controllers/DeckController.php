<?php

namespace App\Http\Controllers;

use App\{Deck, Card, Format};
use Session;
use Validator;
use Illuminate\Http\Request;

class DeckController extends Controller
{
  /**
   * Instantiate a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    // TODO user can see, edit etc his decks
    $this->middleware('can:access-cards', ['except' => ['show']]);
  }

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$decks = Deck::with('format')->get();

		return view('decks.index', compact('decks'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$formats = Format::get(['id', 'name']);

		return view('decks.create', compact('formats'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$deck = new Deck( $request->only(['name', 'description', 'format_id']) );
        $deck->user_id = auth()->user()->id;
		$deck->save();

		Session::flash('message', 'Запись "' . $deck->name . '" успешно добавлена');

		return redirect('/decks');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Deck  $deck
	 * @return \Illuminate\Http\Response
	 */
	public function show(Deck $deck)
	{
		return view('decks.show', compact('deck'));
	}

  /**
   * Attach card to deck.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Deck  $deck
   * @return \Illuminate\Http\Response
   */
	public function addCard(Request $request, Deck $deck)
  {
    $card_id = Card::where('name', $request->input('name'))->get(['id'])->first()->id;

    //dd();
    $deck->cards()->attach($card_id, ['quantity' => $request->input('quantity')]);

    //return redirect('/decks/' . $deck->id);
    return view('decks.temp');
  }


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Deck  $deck
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Deck $deck)
	{
    $formats = Format::get(['id', 'name']);

    return view('decks.edit', compact('deck', 'formats'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Deck  $deck
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Deck $deck)
	{
    $deck->name = $request->name;
    $deck->description = $request->description;
    $deck->format_id = $request->format_id;
    $deck->save();

    Session::flash('message', 'Запись "' . $deck->name . '" успешно обновлена');

    return redirect('/decks');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Deck  $deck
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Deck $deck)
	{
    $deck->delete();
    Session::flash('message', 'Запись "' . $deck->name . '" успешно удалена');

    // check pivot fields detach

    return redirect('/decks');
	}
}
