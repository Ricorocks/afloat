<?php

namespace Database\Factories;

use App\Models\Berth;
use App\Models\Boat;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BerthContract>
 */
class BerthContractFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::factory()->has(Boat::factory())->create();
        return [
            'berth_id' => Berth::factory(),
            'user_id' => $user,
            'boat_id' => $user->boats->first(),
            'starts_at' => now()->subDays(100),
            'ends_at' => now()->addDays(265),
        ];
    }
}
