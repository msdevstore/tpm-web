<?php

namespace Database\Seeders;

use App\Models\ExcluderRing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExcluderRingSeeder extends Seeder
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
                'ring_size' => 4,
                'excluder_size' => '3 1/2"'
            ],
            [
                'ring_size' => 5.015,
                'excluder_size' => '4 1/2"'
            ],
            [
                'ring_size' => 4.5,
                'excluder_size' => '5 1/2"'
            ],
        ];

        foreach ($itemArr as $item) {
            ExcluderRing::create($item);
        }
    }
}
