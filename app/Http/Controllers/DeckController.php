<?php

namespace App\Http\Controllers;

use App\Deck;
use App\Card;
use App\Format;
use Session;
use Validator;
use Illuminate\Http\Request;

class DeckController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$decks = Deck::all();

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
		$deck = $request->only(['name', 'description', 'format_id']);
		$cards = $request->input('cards') ?? []; // ????

		$cards = explode("\n", $cards);
		$cards = array_map('trim', $cards);

		/* First validator */
		/* Validate if a string is properly formatted */
		$rules = [];
		$messages =	[];

		foreach($cards as $key => $value)
		{
			$rules[$key] = 'regex:/^[1-3]+\s[а-яА-Я\s]+/u';
			$messages[$key] = 'Неправильный формат строки «:input»';
		}

		$validator = Validator::make($cards, $rules, $messages);
		if ($validator->fails()) {
			return redirect('decks/create')
				->withErrors($validator)
				->withInput();
		}

		/* Parse string with single card. Make array with keys 'quantity' and 'name' */
		$cards = array_map( function($item) {
			$x = 0;
			$number = '';
			while ($item[$x] != " ") {
				$number .= $item[$x];
				$x++;
			}
			$name = mb_substr($item, $x+1);
			return ['quantity' => $number, 'name' => $name];
		}, $cards);

		/* Second validator */
		/* Validate form input, and $deck['cards'] */
		$validator = Validator::make($deck,
			[
				'name' => 'required|max:50',
				'description' => 'required',
				'format_id' => 'required',
				'cards.*.name' => 'exists:cards,name',
			],
			[
				'name.required'  => 'Не может быть пустым.',
				'name.max'  => 'Не может быть длиннее 50 символов',
				'description.required' => 'Не может быть пустым.',
				'format_id.required' => 'Не может быть пустым.',
				'exists' => 'Карта «:input» не найдена в базе',
			]
		);
		if ($validator->fails()) {
			return redirect('decks/create')
				->withErrors($validator)
				->withInput();
		}
		
		//dd( $cards );
		$pivot = [];
		foreach ($cards as $key => $value) {
			$id = Card::where('name', $value['name'])->pluck('id')->first();
			$pivot[$id] = [ 'quantity' => $value['quantity'] ];
		}
		dd($auth);


		$deck = new Deck( $deck );
		$deck->save();

		$deck->cards()->sync($pivot);
		//$deck->cards()->sync([1 => ['quantity' => 2] ]);

		dd(auth()->user()->id);
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
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Deck  $deck
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Deck $deck)
	{
		//
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
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Deck  $deck
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Deck $deck)
	{
		//
	}
}
