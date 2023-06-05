<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\Address\Type;
use Illuminate\Database\Eloquent\Factories\Factory;
use MatanYadaev\EloquentSpatial\Objects\Point;

class AddressFactory extends Factory
{
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(Type::cases()),
            'line_1' => $this->faker->streetAddress(),
            'line_2' => $this->faker->address(),
            'city' => $this->faker->city(),
            'county' => $this->faker->word(),
            'country' => $this->faker->country(),
            'postcode' => $this->faker->postcode(),
            'alpha_two_code' => $this->faker->countryCode(),
            'alpha_three_code' => $this->faker->countryISOAlpha3(),
            //'location' => new Point($this->faker->latitude(), $this->faker->longitude()),
        ];
    }
}
