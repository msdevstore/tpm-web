<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
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
                'unit' => 'per inch',
                'measure' => 'Inches',
            ],
            [
                'unit' => 'per foot',
                'measure' => 'feet',
            ],
            [
                'unit' => 'each',
                'measure' => 'pieces',
            ],
            [
                'unit' => 'per order',
                'measure' => 'total',
            ]
        ];

        foreach ($itemArr as $item) {
            Unit::create($item);
        }
    }
}
