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
            'name' => $this->faker->word(), // Random word for the room name
            'description' => $this->faker->sentence(), // Random sentence for the room description
            'image' => $this->faker->imageUrl(640, 480, 'nature', true), // Generates a random image URL
        ];
    }
}
