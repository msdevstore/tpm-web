<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'billing_address' => fake()->address(),
            'shipping_address' => fake()->address(),
            'contact' => fake()->name(),
            'phone' => fake()->phoneNumber(),
            'fax' => fake()->phoneNumber(),
            'email' => fake()->email()
        ];
    }
}
