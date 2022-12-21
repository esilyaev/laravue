<?php

namespace Database\Seeders;

use App\Models\IssueType;
use App\Models\Issue;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // \App\Models\User::factory(10)->create();
    IssueType::factory()->create([
      'title' => 'Стройконтроль'
    ]);
    IssueType::factory()->create([
      'title' => 'Проектирование'
    ]);

    Issue::factory(100)->create();
  }
}
