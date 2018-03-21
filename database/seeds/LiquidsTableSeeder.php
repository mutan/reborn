<?php

use Illuminate\Database\Seeder;
use App\Liquid;

class LiquidsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('liquids')->delete();

		$json = File::get("database/data/liquids.json");
		$data = json_decode($json);

		foreach ($data as $obj) {
			Liquid::create([
				'id' => $obj->id,
				'name' => $obj->name
			]);
		}
	}
}
