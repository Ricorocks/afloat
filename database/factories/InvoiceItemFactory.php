<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InvoiceItem>
 */
class InvoiceItemFactory extends Factory
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
                'Lift out', 
                'New anode', 
                'Cleaning work',
                'Antifoul',
                'Welding',
                'Sail repair',
                'Rigging work',
                'Painting',
                'Interior repair',
                'Upgrade wiring',
                'Instrument fix'
            ]),
            'amount' => fake()->numberBetween(10000,100000),
            'vat_rate' => 20,
        ];
    }
}
