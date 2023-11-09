<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PersonFactory extends Factory
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
            'email_verified_at' => $faker->date(),
            'password' => $faker->password,
            'gender' => $faker->randomElement(['male', 'female']),
            'birth' => $faker->date,
            'address' => $faker->address,
            'nickname' =>$faker->name,
            'height' => $faker->numberBetween(130,250),
            'weight' => $faker->numberBetween(30, 200),
            'Academic_background' => $faker->unique()->text(20),
            'income' => $faker->numberBetween(0,9999),
            'holiday' => $faker->randomElement(['月曜', '火曜', '水曜', '木曜', '金曜', '土曜', '日曜']),
            'smoking_habit' => $faker->randomElement(['not_at_all', 'occasionally', 'heavy']),
            'goals' => $faker->randomElement(['love', 'info', 'aoharu', 'enjoy', 'somehow', 'friend']),
            'image_data' => $faker->imageUrl(200,200,'people','true','Faker'),
            'academic_email' => $faker->unique()->safeEmail,
        ];
    }
}
