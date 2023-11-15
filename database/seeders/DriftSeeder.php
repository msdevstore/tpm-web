<?php

namespace Database\Seeders;

use App\Models\Drift;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriftSeeder extends Seeder
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
                'drift_od' => 2.788,
                'drift' => 'HP'
            ],
            [
                'drift_od' => 3.05,
                'drift' => 'B-8'
            ],
            [
                'drift_od' => 4.05,
                'drift' => 'B-2'
            ]
        ];
        foreach($itemArr as $item) {
            Drift::create($item);
        }

    }
}
