<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShopFactory extends Factory
{
    public function definition(): array
    {
        return [
            "name" => fake()->company(),
            "country_id" => (Country::inRandomOrder()->value("id")),
            "city" => fake()->city(),
            "street" => fake()->streetAddress(),
        ];
    }
}
