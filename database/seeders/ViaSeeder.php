<?php

namespace Database\Seeders;

use App\Models\Via;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ViaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $itemArr = ['Levinge Transportation', 'Saia', 'Will Call'];

        foreach ($itemArr as $item) {
            Via::factory()->create([
                'ship_via' => $item
            ]);
        }
    }
}
