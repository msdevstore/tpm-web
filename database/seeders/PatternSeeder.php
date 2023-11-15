<?php

namespace Database\Seeders;

use App\Models\Pattern;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PatternSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pattern::factory()->create([
            'pattern' => '60 Staggered',
            'oa_factor' => 0.1350
        ]);
        Pattern::factory()->create([
            'pattern' => 'Blank',
            'oa_factor' => 0
        ]);
        Pattern::factory()->create([
            'pattern' => 'Contour',
            'oa_factor' => 0
        ]);
        Pattern::factory()->create([
            'pattern' => 'Delta Triangle',
            'oa_factor' => 0
        ]);
        Pattern::factory()->create([
            'pattern' => 'Dimple',
            'oa_factor' => 0.1350
        ]);
    }
}
