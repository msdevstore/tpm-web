<?php

namespace Database\Seeders;

use App\Models\Micron;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MicronSeeder extends Seeder
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
                'mesh' => '18X210',
                'micron' => 197,
                'thickness' => 0.037
            ],
            [
                'mesh' => '18X140',
                'micron' => 175,
                'thickness' => 0.023
            ],
            [
                'mesh' => '70X70',
                'micron' => 198,
                'thickness' => 0.01
            ]
        ];

        foreach ($itemArr as $item) {
            Micron::create($item);
        }
    }
}
