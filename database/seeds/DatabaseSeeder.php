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

			DB::table('elements')->insert([
				['name' => 'Ледяная'],
				['name' => 'Огненная'],
				['name' => 'Водная'],
				['name' => 'Воздушная'],
				['name' => 'Земляная'],
				['name' => 'Темная'],
				['name' => 'Светлая'],
				['name' => 'Нейтральная'],
			]);

			DB::table('artists')->insert([
				['name' => 'Юрий Солнцев'],
				['name' => 'Кристина Чернявская'],
				['name' => 'Мария Ворончихина'],
				['name' => 'Ольга Ломовцева'],
				['name' => 'Chu Chuguy'],
			]);

			DB::table('supertypes')->insert([
				['name' => 'Уникальное'],
				['name' => 'Уникальный'],
			]);

			DB::table('types')->insert([
				['name' => 'Артефакт'],
				['name' => 'Существо'],
			]);

			DB::table('subtypes')->insert([
				['name' => 'Титан'],
				['name' => 'Треналин'],
				['name' => 'Дракон'],
				['name' => 'Зверь'],
				['name' => 'Сидхе'],
				['name' => 'Чидоа'],
			]);

		}
	}
