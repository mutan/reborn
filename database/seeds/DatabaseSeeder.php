<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run()
		{
			// $this->call(UsersTableSeeder::class);
		
			// Roles seeder within UsersTableSeeder
			$this->call(UsersTableSeeder::class);

			$this->call(EditionsTableSeeder::class);
			$this->call(RaritiesTableSeeder::class);
			$this->call(LiquidsTableSeeder::class);
			$this->call(ElementsTableSeeder::class);
			$this->call(ArtistsTableSeeder::class);
			$this->call(SupertypesTableSeeder::class);
			$this->call(TypesTableSeeder::class);
			$this->call(SubtypesTableSeeder::class);

			$this->call(CardsTableSeeder::class);
		}
	}
