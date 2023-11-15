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
        Schema::create('mesh_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('mesh_no');
            $table->string('supplier');
            $table->tinyInteger('allocated');
            $table->integer('job');
            $table->string('tpm_po');
            $table->date('date_received');
            $table->string('operator')->default('');
            $table->double('width')->nullable();
            $table->integer('length')->nullable();
            $table->string('heat')->nullable();
            $table->string('mesh')->nullable();
            $table->string('type')->nullable();
            $table->integer('tpm_job')->nullable();
            $table->integer('splice_chk');
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
        Schema::dropIfExists('mesh_infos');
    }
};
