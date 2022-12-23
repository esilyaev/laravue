<?php

use App\Models\Workflow\Transition;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArcsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('arcs', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->foreignId('place_in')->constrained('places');
      $table->foreignId('place_out')->constrained('places');
      $table->foreignIdFor(Transition::class);

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
    Schema::dropIfExists('arcs');
  }
}
