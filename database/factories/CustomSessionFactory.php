<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=CustomSession>
 */
class CustomSessionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'session_year' => $this->faker->year(),             // Generates a year like "2023"
            'created_date' => $this->faker->date('Y-m-d'),      // Generates a date like "2025-05-19"
            'is_selected' => $this->faker->boolean() ? 1 : 0,   // Random 0 or 1
        ];
    }
}
