<?php

use Illuminate\Database\Seeder;
use App\Card;
use App\Element;
use App\Liquid;
use App\Supertype;
use App\Type;
use App\Subtype;
use App\Artist;

class CardsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('cards')->delete();

		$json = File::get("database/data/cards.json");
		$data = json_decode($json);

		foreach ($data as $obj) {
			$card = Card::create([
				'id' => $obj->id,
				'name' => $obj->name,
				'image' => $obj->image,
				'cost' => $obj->cost,
				'number' => $obj->number,

				'edition_id' => $obj->edition,
				'rarity_id' => $obj->rarity,

				'lives' => $obj->lives,
				'movement' => $obj->movement,
				'power_weak' => $obj->power_weak,
				'power_medium' => $obj->power_medium,
				'power_strong' => $obj->power_strong,

				'text' => $obj->text,
				'flavor' => $obj->flavor,
				'erratas' => $obj->erratas,
				'comments' => $obj->comments,
			]);

			$card->liquids()->sync(
				Liquid::whereIn('name', $obj->liquids)->pluck('id')->toArray()
			);

			$card->elements()->sync(
				Element::whereIn('name', $obj->elements)->pluck('id')->toArray()
			);
			
			$card->supertypes()->sync(
				Supertype::whereIn('name', $obj->supertypes)->pluck('id')->toArray()
			);

			$card->types()->sync(
				Type::whereIn('name', $obj->types)->pluck('id')->toArray()
			);

			$card->subtypes()->sync(
				Subtype::whereIn('name', $obj->subtypes)->pluck('id')->toArray()
			);

			$card->artists()->sync(
				Artist::whereIn('name', $obj->artists)->pluck('id')->toArray()
			);

		}
	}
}
