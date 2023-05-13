<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\tide>
 */
class TideFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'height' => fake()->numberBetween(200, 850),
            'tide_at' => fake()->date(),
            'type' => fake()->randomElement([
                'high', 'low'
            ])
        ];
    }
}
