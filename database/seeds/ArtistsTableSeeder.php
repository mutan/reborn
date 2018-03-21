<?php

use Illuminate\Database\Seeder;
use App\Artist;

class ArtistsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('artists')->delete();

		$json = File::get("database/data/artists.json");
		$data = json_decode($json);

		foreach ($data as $obj) {
			Artist::create([
				'id' => $obj->id,
				'name' => $obj->name
			]);
		}
	}
}
