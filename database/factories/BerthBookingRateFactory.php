<?php

namespace Database\Factories;

use App\Models\Marina;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BerthBookingRate>
 */
class BerthBookingRateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Base Rate',
            'starts_at' => now(),
            'ends_at' => now()->addYear(),
            'day_rate_per_meter' => '1421',
            'max_length_in_cm' => 2500,
            'marina_id' => Marina::factory(),
        ];
    }
}
