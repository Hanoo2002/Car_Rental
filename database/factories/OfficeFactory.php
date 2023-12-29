<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Office;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offices>
 */
class OfficeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $factory->define(Office::class, function (Faker $faker) {
            return [
                'office_id' => $faker->unique()->randomNumber(4),
                'country' => $faker->country,
                'city' => $faker->city,
            ];
        });
    }
}
