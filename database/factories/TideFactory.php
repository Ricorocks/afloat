<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\tide>
 */
class TideFactory extends Factory
{

    private $state = "LOW";
    private $minutes = 15;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tides = [
            'height' => $this->getTideHeight($this->state),
            'tide_at' => now()->addMinutes($this->minutes),
            'type' => $this->state
        ];

        $this->state == "HIGH" ? $this->state = "LOW" : $this->state = "HIGH";
        $this->minutes += 382;

        return $tides;
    }

    private function getTideHeight($state)
    {
        if($state == "HIGH")
        {
            return fake()->numberBetween(600, 850);
        }
        else
        {
            return fake()->numberBetween(250, 400);
        }
    }
}
