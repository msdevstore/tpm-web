<?php

namespace Database\Seeders;

use App\Models\TPMType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TPMTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $itemArr = ['Ready', 'Working'];
        foreach ($itemArr as $item) {
            TPMType::factory()->create([
                'type' => $item
            ]);
        }
    }
}
