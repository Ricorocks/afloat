<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Boat>
 */
class BoatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->randomElement([
                'Southern Sun', 'Born To Sail', 'Sarita', 'Solent Flier', 'Rioja III'
            ]),
            'length_in_centimeters' => fake()->numberBetween(800, 1400),
            'width_in_centimeters' => fake()->numberBetween(300, 500),
            'draught_in_centimeters' => fake()->numberBetween(200, 300),
        ];
    }
}
