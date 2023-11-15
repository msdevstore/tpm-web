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
        Schema::create('parts', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->integer('customer_id');
            $table->string('type');
            $table->string('part');
            $table->integer('gage');
            $table->float('holes');
            $table->float('centers');
            $table->string('pattern');
            $table->float('dim');
            $table->float('dim_plus');
            $table->float('dim_minus');
            $table->tinyInteger('is_od');
            $table->integer('cutoff_length');
            $table->integer('finished_length');
            $table->integer('final_length_geo');
            $table->float('length_plus');
            $table->float('length_minus');
            $table->float('strip');
            $table->string('drift');
            $table->integer('mill');
            $table->float('ring1_min_input');
            $table->float('ring1_max_input');
            $table->float('ring2_min_input');
            $table->float('ring2_max_input');
            $table->float('die');
            $table->string('filter_mesh');
            $table->string('notes');
            $table->string('drawing');
            $table->string('insp_notes');
            $table->string('layer_1_mesh');
            $table->float('layer_1_width');
            $table->string('layer_2_mesh');
            $table->float('layer_2_width');
            $table->string('drainage_1_mesh');
            $table->float('drainage_1_width');
            $table->string('drainage_2_mesh');
            $table->float('drainage_2_width');
            $table->float('blank_length_plus');
            $table->float('blank_length_minus');
            $table->float('depth_of_dimple');
            $table->tinyInteger('is_louver');
            $table->float('depth_of_dimple_plus');
            $table->float('depth_of_dimple_minus');
            $table->float('blank_end');
            $table->float('blank_end_plus');
            $table->float('blank_end_minus');
            $table->float('cutoff_length_plus');
            $table->float('cutoff_length_minus');
            $table->string('drawing_number');
            $table->float('table_height');
            $table->integer('die_position');
            $table->float('shrouded_cutoff_length');
            $table->float('shrouded_cutoff_length_plus');
            $table->float('shrouded_cutoff_length_minus');
            $table->float('rouselle');
            $table->float('niagara');
            $table->float('seyi');
            $table->float('blank_area_input');
            $table->float('cycles_input');
            $table->float('linear_feet_input');
            $table->string('die_stamp');
            $table->float('progression');
            $table->integer('geo_job');
            $table->float('act_mill_angle');
            $table->float('table_position');
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
        Schema::dropIfExists('parts');
    }
};
