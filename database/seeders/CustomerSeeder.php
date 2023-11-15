<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Customer::factory(10)->create();
//        \App\Models\Customer::factory()->create([
//            'name' => 'Autoliv',
//            'billing_address' => 'Autoliv ASP, Inc. 3350 Airport Road Ogden, UT 84405',
//            'shipping_address' => 'Autoliv ASP, Inc. 3350 Airport Road Ogden, UT 84405',
//            'contact' => 'Cindy Smith',
//            'phone' => '801-625-7032',
//            'fax' => '801-625-4890',
//            'email' => 'autoliv@outlook.com',
//        ]);
    }
}
