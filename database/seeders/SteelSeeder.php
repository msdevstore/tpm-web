<?php

namespace Database\Seeders;

use App\Models\Steel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SteelSeeder extends Seeder
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
                'work' => '0070910',
                'material' => '316L',
                'gage' => 14,
                'width' => 6,
                'heat' => 'C91W',
                'holes' => '0.1875',
                'centers' => '0.342',
                'pattern' => '60 Staggered',
                'tpm_po' => 6589,
                'tpm_job' => 0,
                'add_date' => '2021-01-17 22:04:00'
            ],
            [
                'work' => '0070918',
                'material' => '304L',
                'gage' => 16,
                'width' => 6,
                'heat' => '525792',
                'holes' => '0.1875',
                'centers' => '0.342',
                'pattern' => '60 Staggered',
                'tpm_po' => 6589,
                'tpm_job' => 0,
                'add_date' => '2021-01-17 22:04:00'
            ],
            [
                'work' => '0070970',
                'material' => '304L',
                'gage' => 20,
                'width' => 6,
                'heat' => 'B49M',
                'holes' => '0.1875',
                'centers' => '0.342',
                'pattern' => '60 Staggered',
                'tpm_po' => 6589,
                'tpm_job' => 0,
                'add_date' => '2021-01-17 22:04:00'
            ]
        ];

        foreach ($itemArr as $item) {
            Steel::create($item);
        }
    }
}
