<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dislike>
 */
class DislikeFactory extends Factory
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
            'dislike_name' => $faker->name,
            'user_id' => function() {
                return User::factory()->create()->id;
            },
        ];

        'user_id' => function() {
                    return User::factory()->create()->id;
                },
    }
}
