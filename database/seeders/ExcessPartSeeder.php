<?php

namespace Database\Seeders;

use App\Models\ExcessPart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExcessPartSeeder extends Seeder
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
                'job' => 0,
                'customer_id' => 4,
                'part' => '101758604',
                'excess_qty' => 296,
                'date_produced' => '2022-01-14 00:00:00',
                'los' => 'IPICOGEN'
            ],
            [
                'job' => 1,
                'customer_id' => 4,
                'part' => '101758608',
                'excess_qty' => 297,
                'date_produced' => '2022-01-13 00:00:00',
                'los' => 'IPICOGEN
'            ]
        ];
        foreach ($itemArr as $item) {
            ExcessPart::create($item);
        }
    }
}
