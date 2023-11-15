<?php

namespace Database\Seeders;

use App\Models\Gage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gage::factory()->create([
            'gage' => 7,
            'thickness' => 0.179
        ]);
        Gage::factory()->create([
            'gage' => 8,
            'thickness' => 0.164
        ]);
        Gage::factory()->create([
            'gage' => 9,
            'thickness' => 0.149
        ]);
        Gage::factory()->create([
            'gage' => 10,
            'thickness' => 0.134
        ]);
        Gage::factory()->create([
            'gage' => 11,
            'thickness' => 0.12
        ]);
        Gage::factory()->create([
            'gage' => 12,
            'thickness' => 0.105
        ]);
    }
}
