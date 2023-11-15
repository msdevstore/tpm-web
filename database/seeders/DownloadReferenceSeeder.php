<?php

namespace Database\Seeders;

use App\Models\DownloadReference;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DownloadReferenceSeeder extends Seeder
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
                'part' => '1.3',
                'cust_id' => 'Weatherford Well Screen',
                'download_ref' => 'http://acmesoftware.esy.es/mapp/user_files/Weatherford Well Screen/1.3/cert_id_28.pdf',
            ],
            [
                'part' => '123',
                'cust_id' => 'AMPAC Machinery, LLC',
                'download_ref' => 'http://acmesoftware.esy.es/mapp/user_files/Weatherford Well Screen/1.3/cert_id_28.pdf',
            ],
            [
                'part' => '12343',
                'cust_id' => 'BJ Tool Services Ltd',
                'download_ref' => 'http://acmesoftware.esy.es/mapp/user_files/Weatherford Well Screen/1.3/cert_id_28.pdf',
            ]
        ];

        foreach ($itemArr as $item) {
            DownloadReference::create($item);
        }
    }
}
