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

			DB::table('liquids')->insert([
				['name' => 'Ледяная'],
				['name' => 'Огненная'],
				['name' => 'Водная'],
				['name' => 'Воздушная'],
				['name' => 'Земляная'],
				['name' => 'Темная'],
				['name' => 'Светлая'],
				['name' => 'Нейтральная'],
			]);

			DB::table('editions')->insert([
				['name' => 'Кровавый туман', 'code' => 'КТМ', 'quantity' => 180],
				['name' => 'Падение Гваингварда', 'code' => 'ПГВ', 'quantity' => 180],
			]);

			DB::table('rarities')->insert([
				['name' => 'Обычная'],
				['name' => 'Необычная'],
				['name' => 'Редкая'],
				['name' => 'Легендарная'],
			]);
		}
	}
