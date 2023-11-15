<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $itemArr = [
            [
                'name' => 'Graham Haney',
                'mill_operator' => 1,
                'cutoff_operator' => 0,
                'repair_welder' => 1,
                'inspector' => 0,
                'general_laborer' => 1,
                'shipping' => 'Yes',
                'stamping' => 'No',
                'fab' => 'No',
                'direct_pak' => 'No',
                'geo_form' => 'Yes'
            ],
            [
                'name' => 'Clifford White',
                'mill_operator' => 0,
                'cutoff_operator' => 1,
                'repair_welder' => 1,
                'inspector' => 0,
                'general_laborer' => 0,
                'shipping' => 'Yes',
                'stamping' => 'No',
                'fab' => 'No',
                'direct_pak' => 'No',
                'geo_form' => 'No'
            ],
            [
                'name' => 'Dmarcus Dock',
                'mill_operator' => 1,
                'cutoff_operator' => 0,
                'repair_welder' => 1,
                'inspector' => 0,
                'general_laborer' => 1,
                'shipping' => 'Yes',
                'stamping' => 'No',
                'fab' => 'No',
                'direct_pak' => 'Yes',
                'geo_form' => 'No'
            ]
        ];

        foreach ($itemArr as $item) {
            Employee::create($item);
        }
    }
}
