<?php

namespace Database\Seeders;

use App\Models\RawCoil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RawCoilSeeder extends Seeder
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
                'coil_no' => '52181',
                'work' => '7339',
                'weight' => 1350,
                'allocated' => 1,
                'job' => '8079-8768',
                'date_received' => '2022-02-25',
                'cycles' => 11,
                'footage' => 10,
                'no_of_coil' => 0
            ],
            [
                'coil_no' => '52208',
                'work' => '7318',
                'weight' => 1350,
                'allocated' => 1,
                'job' => '7415',
                'date_received' => '2022-02-25',
                'cycles' => 11,
                'footage' => 10,
                'no_of_coil' => 0
            ],
            [
                'coil_no' => '52211',
                'work' => '7315',
                'weight' => 1350,
                'allocated' => 1,
                'job' => '1345',
                'date_received' => '2022-02-25',
                'cycles' => 11,
                'footage' => 10,
                'no_of_coil' => 0
            ]
        ];

        foreach ($itemArr as $item) {
            RawCoil::create($item);
        }
    }
}
