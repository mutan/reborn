<?php

use Illuminate\Database\Seeder;
use App\Subtype;

class SubtypesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('subtypes')->delete();

		$json = File::get("database/data/subtypes.json");
		$data = json_decode($json);

		foreach ($data as $obj) {
			Subtype::create([
				'id' => $obj->id,
				'name' => $obj->name
			]);
		}
	}
}
