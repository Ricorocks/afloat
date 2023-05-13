<?php

namespace Database\Factories;

use App\Enums\Invoice\Status;
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
    public function definition()
    {
        return [
            'issued_at' => $issuedAt = now()->subDays(rand(1, 10)),
            'cancelled_at' => null,
            'paid_at' => $paidAt = match (rand(0 ,1)) {
                1 => $issuedAt->clone()->addDays(rand(1, 5)),
                default => null
            },
            'due_at' => now()->addDays(30),
            'status' => $paidAt ? Status::Paid : $this->faker->randomElement(Status::cases()),
            'marina_id' => Marina::factory(),
            'marina_staff_id' => MarinaStaff::factory(),
            'user_id' => User::factory(),
            'boat_id' => Boat::factory(),
        ];
    }
}
