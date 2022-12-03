<?php

namespace Database\Factories;

use App\Models\Marina;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BoatYard>
 */
class BoatYardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->company(),
            'telephone_number' => fake()->phoneNumber(),
            'marina_id' => Marina::factory()
        ];
    }
}
