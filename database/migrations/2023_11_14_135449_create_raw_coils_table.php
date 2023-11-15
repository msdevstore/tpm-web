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
        Schema::create('raw_coils', function (Blueprint $table) {
            $table->id();
            $table->string('coil_no');
            $table->string('work');
            $table->integer('weight');
            $table->integer('allocated');
            $table->string('job');
            $table->date('date_received');
            $table->integer('cycles');
            $table->integer('footage');
            $table->integer('no_of_coil');
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
        Schema::dropIfExists('raw_coils');
    }
};
