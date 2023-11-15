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
        Schema::create('weld_spec_mills', function (Blueprint $table) {
            $table->id();
            $table->string('weld_spec');
            $table->string('mil_amps');
            $table->string('mil_volts');
            $table->string('mil_speed');
            $table->string('torch_height');
            $table->double('arc_length');
            $table->double('torch_angle');
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
        Schema::dropIfExists('weld_spec_mills');
    }
};
