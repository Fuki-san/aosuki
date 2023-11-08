<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AosukiFactory extends Factory
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
            'name' => $faker->name(),
            'email' => $faker->email(),
            'email_verified_at' => $faker->time(),
            'password' => $faker->password(),
            'two_factor_secret' => $faker->password(),
            'two_factor_recovery_code' => $faker->password()
        ];
    }
}
