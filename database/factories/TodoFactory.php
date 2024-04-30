<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quest_id' => fake()->numberBetween(1,10),
            'activity_id' => fake()->numberBetween(1,10),
            'date' => fake()->datetime,
            'done' => fake()->boolean,
        ];
    }
}
