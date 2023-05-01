<?php

namespace Database\Factories;

use App\Models\BoatYard;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BoatYardServices>
 */
class BoatYardServiceFactory extends Factory
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
                'Lift Out', 'Antifoul', 'Jet Wash', 'Replace Annode'
            ]),
            'notes' => '',
            'price' => '10000',
            'currency' => 'GBP',
            'vat_rate' => '20',
            'boat_yard_id' => BoatYard::factory()
            //
        ];
    }
}
