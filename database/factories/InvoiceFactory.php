<?php

namespace Database\Factories;

use App\Models\Boat;
use App\Models\Marina;
use App\Models\MarinaStaff;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'due_at' => now()->addDays(30),
            'marina_id' => Marina::factory(),
            'marina_staff_id' => MarinaStaff::factory(),
            'user_id' => User::factory(),
            'boat_id' => Boat::factory(),
        ];
    }
}
