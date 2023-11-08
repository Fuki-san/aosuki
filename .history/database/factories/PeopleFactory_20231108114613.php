<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PeopleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('ja_JP');

        return [
            'name' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'email_verified_at' => $faker->now(),
            'password' => $faker->password,
            'gender' => $faker->randomElement(['男性', '女性']),
            'birth' => $faker->date,
            'address' => $faker->address,
            'nickname' =>$faker->name,
            'height' => $faker->numberBetween(140),
            'weight' => $faker->weight,
            'Academic_background' => $faker->unique()->text(20),
        ];
    }
}
