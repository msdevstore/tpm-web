<?php

namespace Database\Seeders;

use App\Models\MacAddress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MacAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MacAddress::factory()->create([
            'device' => 'mill_01',
            'mac_address' => 'PS7317'
        ]);
        MacAddress::factory()->create([
            'device' => 'mill_05',
            'mac_address' => 'a691fbcc918845fe'
        ]);
        MacAddress::factory()->create([
            'device' => 'cut_off_01',
            'mac_address' => '08:12:a5:e3:96:26'
        ]);
    }
}
