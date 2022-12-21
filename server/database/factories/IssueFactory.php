<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class IssueFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      'title' => $this->faker->words(7, true),
      'description' => $this->faker->paragraphs(3, true),
      'duedate' => $this->faker->date(),
      'location' => $this->faker->words(3, true),
      'system' => $this->faker->words(3, true),
      'issue_type_id' => $this->faker->numberBetween(1, 2)
    ];
  }
}
