<?php

namespace Database\Seeders;

use App\Models\WeldSpecMill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeldSpecMillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $itemArr = [
            [
                'weld_spec' => 'TPM-Baker-304-2017',
                'mil_amps' => '207-253',
                'mil_volts' => '12.6-15.5',
                'mil_speed' => '64-79',
                'torch_height' => '.575',
                'arc_length' => 0.075,
                'torch_angle' => 12
            ],
            [
                'weld_spec' => 'TPM-Baker-304-Argon',
                'mil_amps' => '213-260',
                'mil_volts' => '12.8-15.7',
                'mil_speed' => '57.6-70.4',
                'torch_height' => '.575',
                'arc_length' => 0.075,
                'torch_angle' => 12
            ],
            [
                'weld_spec' => 'TPM-Baker-304-2017',
                'mil_amps' => '207-460',
                'mil_volts' => '12.6-15.5',
                'mil_speed' => '64-79',
                'torch_height' => '5',
                'arc_length' => 0.075,
                'torch_angle' => 10
            ],
        ];

        foreach ($itemArr as $item) {
            WeldSpecMill::create($item);
        }
    }
}
