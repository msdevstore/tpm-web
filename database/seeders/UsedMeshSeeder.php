<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class UsedMeshSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\UsedMesh::factory(10)
            ->sequence(fn (Sequence $sequence) => ['mesh_no' => $sequence->index + 1])
            ->create();
    }
}
