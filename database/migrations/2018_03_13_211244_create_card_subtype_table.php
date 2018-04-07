<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardSubtypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_subtype', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('card_id')->unsigned()->index();
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');

            $table->integer('subtype_id')->unsigned()->index();
            $table->foreign('subtype_id')->references('id')->on('subtypes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('card_subtype');
    }
}
