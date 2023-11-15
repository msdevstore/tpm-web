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
        Schema::create('steels', function (Blueprint $table) {
            $table->id();
            $table->string('work');
            $table->string('material');
            $table->integer('gage')->nullable();
            $table->double('width')->nullable();
            $table->string('heat');
            $table->string('holes')->nullable();
            $table->string('centers')->nullable();
            $table->string('pattern')->nullable();
            $table->integer('tpm_po')->nullable();
            $table->tinyInteger('tpm_job');
            $table->dateTime('add_date');
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
        Schema::dropIfExists('steels');
    }
};
