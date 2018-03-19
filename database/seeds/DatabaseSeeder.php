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

  		// Role comes before User seeder here.
			DB::table('roles')->insert([
				['name' => 'player', 'description' => 'Может создавать колоды ...'],
				['name' => 'admin', 'description' => 'Может редактировать карты ...'],
			]);

  		// User seeder will use the roles above created.
			$this->call(UserTableSeeder::class);


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

			DB::table('cards')->insert([
				[
					'name' => 'Ледяной Титан',
					'rarity_id' => 1,
					'edition_id' => 1,
					'cost' => 1,
					'number' => 1,
					'lives' => 1,
					'movement' => 1,
					'power_weak' => 1,
					'power_weak' => 1,
					'power_medium' => 1,
					'power_strong' => 1,
					'image' => '01-020.jpg',
					'text' => '111',
					'flavor' => '111',
					'erratas' => '111',
					'comments' => '111',
				],
				[
					'name' => 'Новый Титан',
					'rarity_id' => 2,
					'edition_id' => 2,
					'cost' => 2,
					'number' => 2,
					'lives' => 2,
					'movement' => 2,
					'power_weak' => 2,
					'power_weak' => 2,
					'power_medium' => 2,
					'power_strong' => 2,
					'image' => '01-001.jpg',
					'text' => '222',
					'flavor' => '222',
					'erratas' => '222',
					'comments' => '222',
				],
			]);

			// seeding many-to-many pivot tables
			App\Card::all()->each(function ($card) {
				$card->liquids()->attach(
					App\Liquid::all()->random(1)->pluck('id')->toArray()
				);

				$card->elements()->attach(
					App\Element::all()->random(1)->pluck('id')->toArray()
				);

				$card->supertypes()->attach(
					App\Supertype::all()->random(1)->pluck('id')->toArray()
				);

				$card->types()->attach(
					App\Type::all()->random(1)->pluck('id')->toArray()
				);

				$card->subtypes()->attach(
					App\Subtype::all()->random(rand(1, 2))->pluck('id')->toArray()
				);

				$card->artists()->attach(
					App\Artist::all()->random(rand(1, 3))->pluck('id')->toArray()
				);				
			});


		}
	}
