<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
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
                'material' => '304',
                'cost' => 2.5,
                'surcharge' => 0.12
            ],
            [
                'material' => '304L',
                'cost' => 3.5,
                'surcharge' => 0.22
            ],
            [
                'material' => 'Carbon',
                'cost' => 4.5,
                'surcharge' => 0.24
            ],
        ];

        foreach ($itemArr as $item) {
            Material::create($item);
        }
    }
}
