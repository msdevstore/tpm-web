<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footer_for_pdfs', function (Blueprint $table) {
            $table->id();
            $table->string('tubmil_log');
            $table->string('tubmil_log_2');
            $table->string('tubmil_log_3');
            $table->string('tubmil_log_4');
            $table->string('tubmil_setup');
            $table->string('tubmil_setup_2');
            $table->string('tubmil_setup_3');
            $table->string('tubmil_setup_4');
            $table->string('first_part_drift');
            $table->string('first_part_drift_2');
            $table->string('first_part_drift_3');
            $table->string('first_part_drift_4');
            $table->string('welding_station_cklist');
            $table->string('welding_station_cklist_2');
            $table->string('welding_station_cklist_3');
            $table->string('welding_station_cklist_4');
            $table->string('worksheet');
            $table->string('worksheet_2');
            $table->string('worksheet_3');
            $table->string('worksheet_4');
            $table->string('direct_pack');
            $table->string('direct_pack_2');
            $table->string('direct_pack_3');
            $table->string('direct_pack_4');
            $table->string('cutoff_station');
            $table->string('cutoff_station_2');
            $table->string('cutoff_station_3');
            $table->string('cutoff_station_4');
            $table->string('inspection_station');
            $table->string('inspection_station_2');
            $table->string('inspection_station_3');
            $table->string('inspection_station_4');
            $table->string('ring_station');
            $table->string('ring_station_2');
            $table->string('ring_station_3');
            $table->string('ring_station_4');
            $table->string('geo_form');
            $table->string('geo_form_2');
            $table->string('geo_form_3');
            $table->string('geo_form_4');
            $table->string('geo_form_ring_concentric');
            $table->string('geo_form_ring_concentric_2');
            $table->string('geo_form_ring_concentric_3');
            $table->string('geo_form_ring_concentric_4');
            $table->string('coil_alloc');
            $table->string('coil_alloc_2');
            $table->string('coil_alloc_3');
            $table->string('coil_alloc_4');
            $table->string('mesh_alloc');
            $table->string('mesh_alloc_2');
            $table->string('mesh_alloc_3');
            $table->string('mesh_alloc_4');
            $table->string('final_inspection');
            $table->string('final_inspection_2');
            $table->string('final_inspection_3');
            $table->string('final_inspection_4');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('footer_for_pdfs');
    }
};
