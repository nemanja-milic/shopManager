<?php

namespace Database\Factories;

use App\Enums\DaysInWeek;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkingTimeShopFactory extends Factory
{
    public function definition(): array
    {
        $closingTime = fake()->time("H:i");
        return [
            "shop_id" => (Shop::inRandomOrder()->value("id")),
            "day_of_week" => array_rand(DaysInWeek::names()),
            "opening_time" => fake()->time("H:i", $closingTime),
            "closing_time" => $closingTime
        ];
    }
}
