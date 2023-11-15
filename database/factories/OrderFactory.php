<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'customer_id' => Customer::all()->random()->id,
            'po' => fake()->numberBetween(10000, 99999),
            'part' => fake()->numberBetween(1000000, 9999999),
            'quantity' => fake()->numberBetween(1, 1000),
            'ordered' => fake()->dateTime(),
            'due' => fake()->dateTime(),
            'has_started' => 1,
            'began' => fake()->dateTime(),
            'has_finished' => fake()->numberBetween(0, 1),
            'finished' => fake()->dateTime(),
            'has_finished_tack' => 0,
            'finished_tack' => fake()->dateTime(),
            'has_shipped' => fake()->numberBetween(0, 1),
            'price' => fake()->randomFloat(3, 0, 100000),
            'item' => 10,
            'instr' => '',
            'balance' => 0,
            'status' => '',
            'call' => fake()->dateTime(),
            'tpm_type'=> '',
            'mill_operator' => fake()->name(),
            'cutoff_operator' => '',
            'repair_welder' => '',
            'inspector' => '',
            'weld_spec_mill' => '',
            'weld_spec_repair' => '',
            'ship_date' => fake()->date(),
            'mil_amps' => '',
            'mil_volts' => '',
            'mil_speed' => '',
            'repair_amps' => '',
            'repair_volts' => '',
            'repair_speed' => '',
            'drift_dim' => '',
            'drift_insp' => '',
            'cont_type' => '',
            'ship_method' => '',
            'device' => '',
            'gen_pdf' => 0
        ];
    }
}
