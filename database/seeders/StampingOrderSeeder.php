<?php

namespace Database\Seeders;

use App\Models\StampingOrder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StampingOrderSeeder extends Seeder
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
                'job' => '8583-8905',
                'customer_id' => 1,
                'part' => '4.5-Unicarrier-105-INR',
                'niagara' => 230,
                'blank_area' => 30,
                'cycles' => 610,
                'linear_feet' => 2900,
                'strip' => 6,
                'remarks' => 'Border: Standard 0.025"',
                'mill_job' => '8583',
                'press' => 'niagara',
                'start_time' => '2013-11-06 22:20:49',
                'finish_time' => '2013-11-06 22:20:49',
                'date_entered' => '2013-11-06 22:20:49'
            ],
            [
                'job' => '9000S',
                'customer_id' => 6,
                'part' => '103044081',
                'setup_op' => 47,
                'niagara' => 230,
                'blank_area' => 30,
                'cycles' => 610,
                'linear_feet' => 2900,
                'strip' => 6,
                'remarks' => 'Border: Standard 0.025"',
                'mill_job' => '8583',
                'press' => 'niagara',
                'start_time' => '2013-11-06 22:20:49',
                'finish_time' => '2013-11-06 22:20:49',
                'date_entered' => '2013-11-06 22:20:49'
            ],
            [
                'job' => '9002S',
                'customer_id' => 1,
                'part' => '103012114',
                'niagara' => 230,
                'blank_area' => 30,
                'cycles' => 610,
                'linear_feet' => 2900,
                'strip' => 6,
                'mill_job' => '8583',
                'remarks' => 'Border: Standard 0.025"',
                'press' => 'niagara',
                'start_time' => '2013-11-06 22:20:49',
                'finish_time' => '2013-11-06 22:20:49',
                'date_entered' => '2013-11-06 22:20:49'
            ],
        ];

        foreach ($itemArr as $item) {
            StampingOrder::create($item);
        }
    }
}
