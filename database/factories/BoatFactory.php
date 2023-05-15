<?php

namespace Database\Factories;

use App\Models\Marina;
use App\Models\User;
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
            'length_in_cm' => fake()->numberBetween(800, 1400),
            'width_in_cm' => fake()->numberBetween(300, 500),
            'draught_in_cm' => fake()->numberBetween(200, 300),
            'type' => fake()->randomElement([
                'Sail', 'Motor',
            ]),
            'user_id' => User::factory(),
            'marina_id' => Marina::factory(),
        ];
    }
}
