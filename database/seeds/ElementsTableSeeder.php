<?php

use Illuminate\Database\Seeder;
use App\Element;

class ElementsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('elements')->delete();

		$json = File::get("database/data/elements.json");
		$data = json_decode($json);

		foreach ($data as $obj) {
			Element::create([
				'id' => $obj->id,
				'name' => $obj->name,
				'image' => $obj->image
			]);
		}
	}
}
