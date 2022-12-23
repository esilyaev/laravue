<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Issue;
use App\Models\IssueType;
use Illuminate\Support\Str;
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

    User::factory()->create([
      'name' => 'eos',
      'email' => 'eos@lc-vote.com',
      'email_verified_at' => now(),
      'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
      'remember_token' => Str::random(10),
    ]);

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
