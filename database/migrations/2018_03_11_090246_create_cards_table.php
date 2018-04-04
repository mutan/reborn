<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cards', function (Blueprint $table) {
			$table->increments('id');

			$table->integer('rarity_id')->unsigned();
			$table->foreign('rarity_id')->references('id')->on('rarities')->onDelete('NO ACTION');
			$table->integer('edition_id')->unsigned();
			$table->foreign('edition_id')->references('id')->on('editions')->onDelete('NO ACTION');

			// liquids, elements, supertypes, types, subtypes, artists: many-to-many

			$table->string('name', 50)->index();
			$table->integer('cost')->unsigned();
			$table->integer('number')->unsigned();

			$table->integer('lives');
			$table->string('movement', 1); // 0+ у существ, N у артефактов, F у летающих
			$table->integer('power_weak')->nullable(); // [0-20], NULL
			$table->integer('power_medium')->nullable(); // [0-20], NULL
			$table->integer('power_strong')->nullable(); // [0-20], NULL

			$table->string('image', 255)->nullable();

			$table->text('text')->nullable();
			$table->text('flavor')->nullable();
			$table->text('erratas')->nullable();
			$table->text('comments')->nullable();

			$table->timestamps();
    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('cards');
	}
}
