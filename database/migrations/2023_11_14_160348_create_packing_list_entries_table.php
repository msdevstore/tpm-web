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
        Schema::create('packing_list_entries', function (Blueprint $table) {
            $table->id();
            $table->string('po');
            $table->string('heat_num');
            $table->string('type_mat');
            $table->string('mesh');
            $table->integer('tot_len');
            $table->double('width');
            $table->double('length');
            $table->integer('quantity');
            $table->integer('crate');
            $table->integer('allocated');
            $table->integer('job');
            $table->dateTime('date_entered');
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
        Schema::dropIfExists('packing_list_entries');
    }
};
