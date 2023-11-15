<?php

namespace Database\Seeders;

use App\Models\DieStamp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DieStampSeeder extends Seeder
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
                'die_id' => '1/2 x 1 inline',
                'progression' => 3
            ],
            [
                'die_id' => '1/4 x 1 angle',
                'progression' => 1
            ],
            [
                'die_id' => '1/4 x 1/2 angle',
                'progression' => 1.5
            ]
        ];

        foreach ($itemArr as $item) {
            DieStamp::create($item);
        }
    }
}
