<?php

namespace Database\Seeders;

use App\Models\InstType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $itemArr = ['Hold!!', 'Advise', 'Ship'];

        foreach ($itemArr as $item) {
            InstType::factory()->create([
                'instruction' => $item
            ]);
        }
    }
}
