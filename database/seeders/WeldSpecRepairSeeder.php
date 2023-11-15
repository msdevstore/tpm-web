<?php

namespace Database\Seeders;

use App\Models\WeldSpecRepair;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeldSpecRepairSeeder extends Seeder
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
                'weld_spec' => 'TPM-WPS-304RW',
                'repair_amps' => '90-150',
                'repair_volts' => '11.25-18.7',
                'repair_speed' => '1-3',
                'filler_rod' => 'ER308/308L 1/16"',
                'torch_height' => '0',
                'electro_length' => '0',
                'gas_repair' => '0'
            ],
            [
                'weld_spec' => 'TPM-WPS-316R',
                'repair_amps' => '65-150',
                'repair_volts' => '11.5-18',
                'repair_speed' => '1-2',
                'filler_rod' => 'ER316/316L 1/16"',
                'torch_height' => '0',
                'electro_length' => '0',
                'gas_repair' => '0'
            ],
            [
                'weld_spec' => 'TPM-WPS-625M',
                'repair_amps' => '75-150',
                'repair_volts' => 'N/A',
                'repair_speed' => '1-3',
                'filler_rod' => 'ER625/625L 1/16"',
                'torch_height' => '0',
                'electro_length' => '0',
                'gas_repair' => '0'
            ]
        ];

        foreach ($itemArr as $item) {
            WeldSpecRepair::create($item);
        }
    }
}
