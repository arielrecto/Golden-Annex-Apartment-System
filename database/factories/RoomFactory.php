<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'room_number' => fake()->numberBetween(100, 400),
            'floor' => fake()->randomElement(['floor 1', 'floor 2', 'floor 3', 'floor 4'])
        ];
    }
}
