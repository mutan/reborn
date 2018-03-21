<?php

use Illuminate\Database\Seeder;
use App\Supertype;

class SupertypesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('supertypes')->delete();

		$json = File::get("database/data/supertypes.json");
		$data = json_decode($json);

		foreach ($data as $obj) {
			Supertype::create([
				'id' => $obj->id,
				'name' => $obj->name
			]);
		}
	}
}
