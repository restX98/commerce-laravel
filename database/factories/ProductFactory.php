<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cod' => fake()->numerify('PRD###'),
            'name' => fake()->words(3, true),
            'price' => fake()->randomFloat(2, 20, 1000),
        ];
    }
}
