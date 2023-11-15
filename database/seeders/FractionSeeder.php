<?php

namespace Database\Seeders;

use App\Models\Fraction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FractionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fraction::factory()->create([
            'decimal' => 0.06,
            'fraction' => '1/16',
            'fractionN' => '1',
            'fractionD' => '1/16',
            'centers' => '1/16',
            'holes' => '1/16',
        ]);
        Fraction::factory()->create([
            'decimal' => 0.125,
            'fraction' => '1/8',
            'fractionN' => '1',
            'fractionD' => '8',
            'centers' => '1/8"',
            'holes' => '1/8"',
        ]);
    }
}
