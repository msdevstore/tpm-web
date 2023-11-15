<?php

namespace Database\Seeders;

use App\Models\UsedCoil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsedCoilSeeder extends Seeder
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
                'coil_no' => '10000',
                'work' => '43386',
                'weight' => 1464,
                'job' => 2221,
                'date_received' => '2006-11-01',
                'date_used' => '2007-02-27',
                'operator' => 'LOZANO'
            ],
            [
                'coil_no' => '10006',
                'work' => '43386',
                'weight' => 1325,
                'job' => 2286,
                'date_received' => '2006-11-02',
                'date_used' => '2007-02-27',
                'operator' => 'JC'
            ],
            [
                'coil_no' => '10015',
                'work' => '43386',
                'weight' => 1465,
                'job' => 2286,
                'date_received' => '2006-11-01',
                'date_used' => '2007-02-27',
                'operator' => 'Nagi'
            ]
        ];

        foreach ($itemArr as $item) {
            UsedCoil::create($item);
        }
    }
}
