<?php

namespace Database\Seeders;

use App\Models\StatusType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $itemsArr = [
            'demand', 'e-mailed', 'call', 'ship'
        ];

        foreach ($itemsArr as $item) {
            StatusType::factory()->create([
                'status' => $item
            ]);
        }
    }
}
