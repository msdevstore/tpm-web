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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('mill_operator');
            $table->tinyInteger('cutoff_operator');
            $table->tinyInteger('repair_welder');
            $table->tinyInteger('inspector');
            $table->tinyInteger('general_laborer');
            $table->string('shipping');
            $table->string('stamping');
            $table->string('fab');
            $table->string('direct_pak');
            $table->string('geo_form');
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
        Schema::dropIfExists('employees');
    }
};
