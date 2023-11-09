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
            'email_verified_at' => 'now'->now(),
            'password' => $faker->password,
            'gender' => $faker->randomElement(['男性', '女性']),
            'birth' => $faker->date,
            'address' => $faker->address,
            'nickname' =>$faker->name,
            'height' => $faker->numberBetween(130,250),
            'weight' => $faker->numberBetween(30, 200),
            'Academic_background' => $faker->unique()->text(20),
            'income' => $faker->numberBetween(0,9999),
            'holiday' => $faker->randomElement(['月曜', '火曜', '水曜', '木曜', '金曜', '土曜', '日曜']),
            'smoking_habit' => $faker->randomElement(['全く吸わない', 'たまに吸う', '頻繁に吸う']),
            'goals' => $faker->randomElement(['パートナーを見つけるため', '情報得たいため', '青春を味わうため', '楽しむため', 'なんとなく', '友達作りのため']),
            'image_data' => $faker->imageUrl(200,200,'people','true','Faker'),
            'academic_email' => $faker->unique()->safeEmail,
        ];
    }
}
