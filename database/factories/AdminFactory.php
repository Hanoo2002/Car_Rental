<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Admin;
use App\Models\Office;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $factory->define(Admin::class, function (Faker $faker) {
            $officeIds = Office::pluck('office_id')->toArray();
        
            return [
                'fname' => $faker->firstName,
                'lname' => $faker->lastName,
                'admin_id' => $faker->unique()->randomNumber(5),
                'office_id' => $faker->randomElement($officeIds),
                'password' => Hash::make('password'), // You might want to generate random secure passwords
                'email' => $faker->unique()->safeEmail,
                // Add other attributes as needed
            ];
        });
    }
}
