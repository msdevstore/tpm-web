<?php

namespace Database\Seeders;

use App\Models\Ring;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $itemArr = ['N/A', 'XJ10'];

        foreach ($itemArr as $item) {
            Ring::factory()->create([
                'heat' => $item
            ]);
        }
    }
}
