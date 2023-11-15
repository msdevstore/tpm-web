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
        Schema::create('weld_spec_repairs', function (Blueprint $table) {
            $table->id();
            $table->string('weld_spec');
            $table->string('repair_amps');
            $table->string('repair_volts');
            $table->string('repair_speed');
            $table->string('filler_rod');
            $table->string('torch_height');
            $table->string('electro_length');
            $table->string('gas_repair');
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
        Schema::dropIfExists('weld_spec_repairs');
    }
};
