<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Marina>
 */
class MarinaFactory extends Factory
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
            'address_line_1' => fake()->streetAddress(),
            'city' => fake()->city(),
            'postcode' => fake()->postcode(),
            'country' => 'gb',
            'phone_number' => fake()->phoneNumber(),
            'website' => fake()->domainName(),
            'email' => fake()->email(),
            'vhf_channel' => fake()->numberBetween(0,80),
            'lattitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
        ];
    }
}
