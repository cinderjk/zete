<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MessageLog>
 */
class MessageLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'device_name' => $this->faker->word,
            'to' => $this->faker->phoneNumber(),
            'message' => $this->faker->text(),
            'status' => 200,
            'created_at' => now(),
        ];
    }
}
