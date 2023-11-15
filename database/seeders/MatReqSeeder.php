<?php

namespace Database\Seeders;

use App\Models\MatReq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MatReqSeeder extends Seeder
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
                'customer' => 'Baker Oil Tools',
                'part' => '7.386 Shroud Test',
                'quantity' => 1,
                'dim' => 2,
                'length' => 3,
                'pattern' => 'Delta Triangle',
                'holes' => 0.09,
                'centers' => 0.125,
                'gage' => 7,
                'strip' => 1,
                'is_od' => 1,
                'density' => 0.29
            ],
            [
                'customer' => 'Hooper Welding',
                'part' => '617-304-40',
                'quantity' => 1,
                'dim' => 2,
                'length' => 3,
                'pattern' => 'Delta Triangle',
                'holes' => 0.09,
                'centers' => 0.125,
                'gage' => 7,
                'strip' => 1,
                'is_od' => 1,
                'density' => 0.29
            ],
            [
                'part' => '',
                'quantity' => 1,
                'dim' => 2,
                'length' => 3,
                'pattern' => 'Delta Triangle',
                'holes' => 0.09,
                'centers' => 0.125,
                'gage' => 7,
                'strip' => 1,
                'is_od' => 1,
                'density' => 0.29
            ]
        ];

        foreach ($itemArr as $item) {
            MatReq::create($item);
        }
    }
}
