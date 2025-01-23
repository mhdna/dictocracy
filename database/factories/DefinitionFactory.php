<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Definition>
 */
class DefinitionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->numberBetween(1, 10),
            'term_id' => fake()->numberBetween(1, 100),
            'definition' => fake()->paragraph(2),
            'example' => fake()->paragraph(1),
            'upvotes' => fake()->numberBetween(2, 1000),
            'downvotes' => fake()->numberBetween(2, 1000)
        ];
    }
}
