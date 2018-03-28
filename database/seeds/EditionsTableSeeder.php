<?php

use Illuminate\Database\Seeder;
use App\Edition;

class EditionsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('editions')->delete();

		$json = File::get("database/data/editions.json");
		$data = json_decode($json);

		foreach ($data as $obj) {
			Edition::create([
				'id' => $obj->id,
				'name' => $obj->name,
				'image' => $obj->image,
				'code' => $obj->code,
				'quantity' => $obj->quantity,
				'description' => $obj->description
			]);
		}
	}
}
