<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Word>
 */
class WordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'language_id' => 3,
            'dialect_id' => 1,
            'word' => fake()->word(),
            'meaning' => fake()->paragraph(3),
            'example' => fake()->paragraph(2),
            'upvotes' => fake()->numberBetween(2, 2000),
            'downvotes' => fake()->numberBetween(2, 2000)
        ];
    }
}
