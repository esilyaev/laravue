<?php

use App\Models\IssueType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('issues', function (Blueprint $table) {
      $table->id();
      $table->string('title');
      $table->text('description');
      $table->date('duedate');
      $table->string('location');
      $table->string('system');
      $table->timestamps();

      $table->foreignIdFor(IssueType::class);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('issues');
  }
}
