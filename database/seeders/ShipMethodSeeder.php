<?php

namespace Database\Seeders;

use App\Models\ShipMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShipMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $methods = ['Air', 'Ocean', 'Truck', 'None'];
        foreach ($methods as $method) {
            ShipMethod::factory()->create([
                'ship_method' => $method
            ]);
        }
    }
}
