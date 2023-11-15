<?php

namespace Database\Seeders;

use App\Models\DieInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DieInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DieInfo::factory(5)
            ->sequence(fn (Sequence $sequence) => ['die' => $sequence->index])
            ->create();
    }
}
