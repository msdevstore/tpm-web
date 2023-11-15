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
        Schema::create('used_coils', function (Blueprint $table) {
            $table->id();
            $table->string('coil_no');
            $table->string('work');
            $table->integer('weight');
            $table->integer('job');
            $table->string('stamp_job')->nullable();
            $table->date('date_received');
            $table->date('date_used');
            $table->string('operator');
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
        Schema::dropIfExists('used_coils');
    }
};
