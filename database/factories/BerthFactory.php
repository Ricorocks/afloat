<?php

namespace Database\Factories;

use App\Models\Marina;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berth>
 */
class BerthFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'leg' => fake()->randomLetter(),
            'berth_number' => fake()->numberBetween(1,22),
            'internal_id' => fake()->randomLetter(4),
            'max_length_in_cm' => fake()->numberBetween(1000, 2000),
            'max_width_in_cm' => fake()->numberBetween(300,400),
            'max_draught_in_cm' => fake()->numberBetween(200,800),
            'overlay_x' => fake()->numberBetween(0,100),
            'overlay_y' => fake()->numberBetween(0,100),
            'overlay_rotate' => fake()->numberBetween(0,365),
            'marina_id' => Marina::factory()
        ];
    }
}
