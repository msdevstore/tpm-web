<?php

namespace Database\Seeders;

use App\Models\Coil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoilSeeder extends Seeder
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
                'coil_no' => '20691-1',
                'work' => '03102023',
                'weight' => 0,
                'allocated' => 0,
                'job' => 0,
                'stamp_job' => '',
                'date_received' => '2023-03-10',
                'operator' => '1947',
                'cycles' => '0',
                'footage' => 100,
                'no_of_coil' => 0,
                'in_shop' => 0
            ],
            [
                'coil_no' => '20691-2',
                'work' => '03102023',
                'weight' => 200,
                'allocated' => 0,
                'job' => 0,
                'stamp_job' => '',
                'date_received' => '2023-03-10',
                'operator' => '1947',
                'cycles' => '0',
                'footage' => 100,
                'no_of_coil' => 0,
                'in_shop' => 0
            ],
            [
                'coil_no' => '20938',
                'work' => '2023',
                'weight' => 0,
                'allocated' => 0,
                'job' => 0,
                'stamp_job' => '',
                'date_received' => '2023-01-26',
                'operator' => '1947',
                'cycles' => '0',
                'footage' => 0,
                'no_of_coil' => 1,
                'in_shop' => 0
            ]
        ];
        foreach($itemArr as $item) {
            Coil::create($item);
        }
    }
}
