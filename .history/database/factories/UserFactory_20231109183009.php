<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
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
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
            
            'current_team_id' => null,
            'gender' => $faker->randomElement(['male', 'female']),
            'birth' => $faker->date,
            'address' => $faker->address,
            'nickname' => $faker->name,
            'height' => $faker->numberBetween(130, 250),
            'weight' => $faker->numberBetween(30, 200),
            'Academic_background' => $faker->unique()->text(20),
            'income' => $faker->numberBetween(0, 9999),
            'holiday' => $faker->randomElement(['月曜', '火曜', '水曜', '木曜', '金曜', '土曜', '日曜']),
            'smoking_habit' => $faker->randomElement(['not_at_all', 'occasionally', 'heavy']),
            'goals' => $faker->randomElement(['love', 'info', 'aoharu', 'enjoy', 'somehow', 'friend']),
            'image_data' => $faker->imageUrl(200, 200, 'people', 'true', 'Faker'),
            'academic_email' => $faker->unique()->safeEmail,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * Indicate that the user should have a personal team.
     */
    public function withPersonalTeam(callable $callback = null): static
    {
        if (!Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(fn (array $attributes, User $user) => [
                    'name' => $user->name . '\'s Team',
                    'user_id' => $user->id,
                    'personal_team' => true,
                ])
                ->when(is_callable($callback), $callback),
            'ownedTeams'
        );
    }
}
