<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditionFormatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edition_format', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('edition_id')->unsigned()->index();
            $table->foreign('edition_id')->references('id')->on('editions')->onDelete('cascade');

            $table->integer('format_id')->unsigned()->index();
            $table->foreign('format_id')->references('id')->on('formats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('edition_format');
    }
}
