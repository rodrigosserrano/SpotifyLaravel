<?php

namespace Database\Factories;

use App\Entities\ConnectedAccount;
use App\Entities\UserStatus;
use App\Enums\UserStatusEnum;
use App\Illuminate\Custom\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Entities\User>
 */
class UserStatusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(array_column(UserStatusEnum::cases(), 'value'))
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
