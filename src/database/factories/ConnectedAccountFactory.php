<?php

namespace Database\Factories;

use App\Illuminate\Custom\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Entities\Model>
 */
class ConnectedAccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => fake()->uuid(),
            'google_id' => fake()->numerify('#####################'),
        ];
    }
}
