<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UsedMesh>
 */
class UsedMeshFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'supplier' => 'ANPING RUNTECH METAL',
            'allocated' => 0,
            'job' => 7190,
            'tpm_po' => '4887',
            'date_received' => fake()->date('Y-m-d', 'now'),
            'date_used' => fake()->date('Y-m-d', 'now'),
            'operator' => fake()->name(),
            'width' => 0.78,
            'length' => 78,
            'heat' => 20210320,
            'mesh' => 'mesh',
            'type' => '316L',
            'tpm_job' => fake()->numberBetween(10, 100),
        ];
    }
}
