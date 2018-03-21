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
		
			// User seeder will use the roles above created.
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

			// DB::table('cards')->insert([
			// 	[
			// 		'name' => 'Ледяной Титан',
			// 		'rarity_id' => 1,
			// 		'edition_id' => 1,
			// 		'cost' => 1,
			// 		'number' => 1,
			// 		'lives' => 1,
			// 		'movement' => 1,
			// 		'power_weak' => 1,
			// 		'power_medium' => 1,
			// 		'power_strong' => 1,
			// 		'image' => '01-020.jpg',
			// 		'text' => '111',
			// 		'flavor' => '111',
			// 		'erratas' => '111',
			// 		'comments' => '111',
			// 	],
			// 	[
			// 		'name' => 'Новый Титан',
			// 		'rarity_id' => 2,
			// 		'edition_id' => 2,
			// 		'cost' => 2,
			// 		'number' => 2,
			// 		'lives' => 2,
			// 		'movement' => 2,
			// 		'power_weak' => 2,
			// 		'power_medium' => 2,
			// 		'power_strong' => 2,
			// 		'image' => '01-001.jpg',
			// 		'text' => '222',
			// 		'flavor' => '222',
			// 		'erratas' => '222',
			// 		'comments' => '222',
			// 	],
			// ]);

			// // seeding many-to-many pivot tables
			// App\Card::all()->each(function ($card) {
			// 	$card->liquids()->attach(
			// 		App\Liquid::all()->random(1)->pluck('id')->toArray()
			// 	);

			// 	$card->elements()->attach(
			// 		App\Element::all()->random(1)->pluck('id')->toArray()
			// 	);

			// 	$card->supertypes()->attach(
			// 		App\Supertype::all()->random(1)->pluck('id')->toArray()
			// 	);

			// 	$card->types()->attach(
			// 		App\Type::all()->random(1)->pluck('id')->toArray()
			// 	);

			// 	$card->subtypes()->attach(
			// 		App\Subtype::all()->random(rand(1, 2))->pluck('id')->toArray()
			// 	);

			// 	$card->artists()->attach(
			// 		App\Artist::all()->random(rand(1, 3))->pluck('id')->toArray()
			// 	);				
			// });


		}
	}
