<?php

namespace Database\Factories;

use App\Models\Berth;
use App\Models\BerthBookingRate;
use App\Models\Boat;
use App\Models\InvoiceItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BerthBooking>
 */
class BerthBookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'starts_at' => now()->addDays(60),
            'ends_at' => now()->addDays(67),
            'berth_id' => Berth::factory(),
            'user_id' => User::factory(),
            'boat_id' => Boat::factory(),
        ];
    }
}
