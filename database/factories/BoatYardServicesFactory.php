<?php

namespace Database\Factories;

use App\Models\BoatYard;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BoatYardServices>
 */
class BoatYardServicesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->words(3),
            'notes' => fake()->paragraph(),
            'price' => '10000',
            'curency' => 'GBP',
            'vat_rate' => '20',
            'boat_yard_id' => BoatYard::factory()
            //
        ];
    }
}
