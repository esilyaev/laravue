<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransitionsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('transitions', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->text('description');
      $table->enum('trigger', ['USER', 'AUTO', 'MSG', 'TIME']);

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
    Schema::dropIfExists('transitions');
  }
}
