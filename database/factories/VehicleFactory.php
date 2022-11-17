<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'registration' => Str::upper($this->faker->bothify('??## ???')),
            'vin' => $this->faker->bothify('??#??##?#??######'),
            'make' => $this->faker->word,
            'model' => $this->faker->word,
            'color' => $this->faker->colorName(),
            'fuel_type' => $this->faker->randomElement(['diesel', 'petrol', 'electric']),
            'primary_image_url' => $this->faker->imageUrl(),
            'co2_emissions' => $this->faker->numberBetween(50, 252),
            'engine_capacity' => $this->faker->numberBetween(125, 435),
            'registered_on' => Date::parse('1 year ago'),
            'mot_due_on' => fn ($attributes) => $attributes['registered_on']->addYears(2),
            'tax_due_on' => fn ($attributes) => $attributes['registered_on']->addYears(2),
            'insurance_renews_on' => fn ($attributes) => $attributes['registered_on']->addYears(2),
            'congestion_charge_renews_on' => fn ($attributes) => $attributes['registered_on']->addYears(2),
            'user_id' => User::factory(),
        ];
    }
}
