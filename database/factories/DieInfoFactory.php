<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DieInfo>
 */
class DieInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'die_id' => fake()->randomFloat('2', '1', '5'),
            'notes' => '#'.fake()->numberBetween(10, 99).' Split',
            'clamp_od' => fake()->numberBetween(1, 9)
        ];
    }
}
