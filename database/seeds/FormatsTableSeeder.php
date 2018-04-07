<?php

use Illuminate\Database\Seeder;
use App\Format;

class FormatsTableSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		$format = new Format();
		$format->name = 'Стандарт (КТМ)';
		$format->description = '<p>Первый стандарт. Разрешен только выпуск «Кровавый туман».</p>';
		$format->save();
		$format->editions()->sync([1]);

		$format = new Format();
		$format->name = 'Стандарт (КТМ + ПГВ)';
		$format->description = '<p>Второй стандарт. Разрешены выпуски «Кровавый туман» и «Падение Гваингварда».</p>';
		$format->save();
		$format->editions()->sync([1, 2]);
	}
}
