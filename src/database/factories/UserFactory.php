<?php

namespace Database\Factories;

use App\Entities\ConnectedAccount;
use App\Illuminate\Custom\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Entities\User>
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
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'cpf' => fake()->cpf(false),
            'birth_date' => fake()->date(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'email_verified' => true,
            'picture_link' => 'https://icon-library.com/images/default-user-icon/default-user-icon-20.jpg',
            'password' => Hash::make(''),
            'has_password' => false,
            'connected_account_id' => ConnectedAccount::factory(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
            'email_verified'    => true,
        ]);
    }

    public function withoutConnectedAccount(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => now(),
            'email_verified' => true,
            'password' => Hash::make('password'),
            'has_password' => true,
        ]);
    }
}
