<?php

namespace Database\Seeders;

use App\Models\FooterForPdf;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FooterForPdfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = [
            'tubmil_log' => '',
            'tubmil_log_2' => '',
            'tubmil_log_3' => '',
            'tubmil_log_4' => 'TPM-ML-002 REV 2  11/30/2018',
            'tubmil_setup' => '',
            'tubmil_setup_2' => '',
            'tubmil_setup_3' => '',
            'tubmil_setup_4' => 'TPM-MD-002 REV 2  11/30/2018',
            'first_part_drift' => '',
            'first_part_drift_2' => '',
            'first_part_drift_3' => '',
            'first_part_drift_4' => 'TPM-FPD-002 REV 2  11/30/2018',
            'welding_station_cklist' => '',
            'welding_station_cklist_2' => '',
            'welding_station_cklist_3' => '',
            'welding_station_cklist_4' => 'TPM-WC-002 REV 2  11/30/2018',
            'worksheet' => '',
            'worksheet_2' => '',
            'worksheet_3' => '',
            'worksheet_4' => 'TPM-WS-002 REV 2  11/30/2018',
            'direct_pack' => '',
            'direct_pack_2' => '',
            'direct_pack_3' => '',
            'direct_pack_4' => 'TPM-DTP-002 REV 2  11/30/2018',
            'cutoff_station' => '',
            'cutoff_station_2' => '',
            'cutoff_station_3' => '',
            'cutoff_station_4' => 'TPM-CS-002 REV 2  11/30/2018',
            'inspection_station' => '',
            'inspection_station_2' => '',
            'inspection_station_3' => '',
            'inspection_station_4' => 'TPM-IS-002 REV 2  11/30/2018',
            'ring_station' => '',
            'ring_station_2' => '',
            'ring_station_3' => '',
            'ring_station_4' => 'TPM-RS-002 REV 2  11/30/2018',
            'geo_form' => '',
            'geo_form_2' => '',
            'geo_form_3' => '',
            'geo_form_4' => 'TPM-GFR-002 REV 2  11/30/2018',
            'geo_form_ring_concentric' => '',
            'geo_form_ring_concentric_2' => '',
            'geo_form_ring_concentric_3' => '',
            'geo_form_ring_concentric_4' => 'TPM-GRC-002 REV 2  11/30/2018',
            'coil_alloc' => '',
            'coil_alloc_2' => '',
            'coil_alloc_3' => '',
            'coil_alloc_4' => 'TPM-CA-002 REV 2  11/30/2018',
            'mesh_alloc' => '',
            'mesh_alloc_2' => '',
            'mesh_alloc_3' => '',
            'mesh_alloc_4' => 'TPM-MA-002 REV 2  11/30/2018',
            'final_inspection' => '',
            'final_inspection_2' => '',
            'final_inspection_3' => '',
            'final_inspection_4' => 'TPM-GFI-002 REV 2  11/30/2018'
        ];

        FooterForPdf::create($item);
    }
}
