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
        Schema::create('abc', function (Blueprint $table) {
            $table->id();
            $table->string('coil_no');
            $table->integer('weight');
            $table->tinyInteger('material');
            $table->tinyInteger('work');
            $table->float('gage');
            $table->string('pattern');
            $table->float('holes');
            $table->float('centers');
            $table->float('width');
            $table->string('heat');
            $table->date('date_received');
            $table->integer('allocated');
            $table->integer('job');
            $table->string('cycles');
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
        Schema::dropIfExists('a_b_c_s');
    }
};
