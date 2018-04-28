<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournamentsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('tournaments', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name', 100)->unique();
      $table->text('description');

      $table->integer('format_id')->unsigned()->index();
      $table->foreign('format_id')->references('id')->on('formats')->onDelete('cascade');

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
    Schema::dropIfExists('tournaments');
  }
}
