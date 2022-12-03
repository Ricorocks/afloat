<?php

namespace Database\Factories;

use App\Models\Gate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GateEvent>
 */
class GateEventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'label' => fake()->randomElement([
                'raise', 'lower'
            ]),
            'happens_at' => fake()->dateTime(),
            'gate_id' => Gate::factory()
        ];
    }
}
