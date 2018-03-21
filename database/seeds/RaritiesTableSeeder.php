<?php

use Illuminate\Database\Seeder;
use App\Rarity;

class RaritiesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('rarities')->delete();

		$json = File::get("database/data/rarities.json");
		$data = json_decode($json);

		foreach ($data as $obj) {
			Rarity::create([
				'id' => $obj->id,
				'name' => $obj->name
			]);
		}
	}
}
