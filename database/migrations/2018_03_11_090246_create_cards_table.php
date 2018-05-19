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

			// liquids, elements, supertypes, types, subtypes, artists – many-to-many

			$table->string('name', 50)->index();
			$table->integer('cost')->unsigned();
			$table->integer('number')->unsigned();

      $table->integer('lives')->unsigned();
			$table->boolean('flying');
			$table->integer('movement')->unsigned()->nullable(); // 0+, NULL
			$table->integer('power_weak')->unsigned()->nullable(); // [0-20], NULL
			$table->integer('power_medium')->unsigned()->nullable(); // [0-20], NULL
			$table->integer('power_strong')->unsigned()->nullable(); // [0-20], NULL

			$table->string('image', 50)->nullable();

			$table->text('text')->nullable();
			$table->text('flavor')->nullable();
			$table->text('erratas')->nullable();
			$table->text('comments')->nullable();

			$table->timestamps();

      $table->engine = 'InnoDB';
      $table->charset = 'utf8';
      $table->collation = 'utf8_general_ci';
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
