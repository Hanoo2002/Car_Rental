<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Office;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $factory->define(Car::class, function (Faker $faker) {
            return [
                'year' => $faker->numberBetween(1990, 2023),
                'model'=> $faker->randomElement(["Mazda" , "Toyota" , "Mercedes" , "Tesla" , "BMW" , "Lada"]),
                'color' => $faker->safeColorName(),
                'office_id' => function () {
                    // Assuming you have an Office model and want to associate cars with offices
                    return App\Models\Office::inRandomOrder()->first()->office_id;
                },
            ];
        });
    }
}
