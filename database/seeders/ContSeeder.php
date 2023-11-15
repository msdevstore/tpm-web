<?php

namespace Database\Seeders;

use App\Models\Cont;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cont::factory()->create([
            'cont_type' => 'box'
        ]);
        Cont::factory()->create([
            'cont_type' => 'pallet'
        ]);
    }
}
