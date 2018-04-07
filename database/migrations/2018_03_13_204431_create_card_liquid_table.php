<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardLiquidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_liquid', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('card_id')->unsigned()->index();
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');

            $table->integer('liquid_id')->unsigned()->index();
            $table->foreign('liquid_id')->references('id')->on('liquids')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('card_liquid');
    }
}
