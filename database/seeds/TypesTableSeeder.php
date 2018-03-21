<?php

use Illuminate\Database\Seeder;
use App\Type;

class TypesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('types')->delete();

		$json = File::get("database/data/types.json");
		$data = json_decode($json);

		foreach ($data as $obj) {
			Type::create([
				'id' => $obj->id,
				'name' => $obj->name
			]);
		}
	}
}
