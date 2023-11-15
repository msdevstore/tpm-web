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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->string('po')->nullable();
            $table->string('part')->nullable();
            $table->integer('quantity')->nullable();
            $table->dateTime('ordered')->nullable();
            $table->dateTime('due')->nullable();
            $table->tinyInteger('has_started');
            $table->dateTime('began')->nullable();
            $table->tinyInteger('has_finished');
            $table->dateTime('finished')->nullable();
            $table->tinyInteger('has_finished_tack')->nullable();
            $table->dateTime('finished_tack')->nullable();
            $table->tinyInteger('has_shipped');
            $table->decimal('price')->nullable();
            $table->integer('item')->nullable();
            $table->string('instr')->nullable();
            $table->integer('balance')->nullable();
            $table->string('status')->nullable();
            $table->dateTime('call')->nullable();
            $table->string('tpm_type')->nullable();
            $table->string('mill_operator')->nullable();
            $table->string('cutoff_operator')->nullable();
            $table->string('repair_welder')->nullable();
            $table->string('inspector')->nullable();
            $table->string('weld_spec_mill')->nullable();
            $table->string('weld_spec_repair')->nullable();
            $table->date('ship_date')->nullable();
            $table->string('mil_amps')->nullable();
            $table->string('mil_volts')->nullable();
            $table->string('mil_speed')->nullable();
            $table->string('repair_amps')->nullable();
            $table->string('repair_volts')->nullable();
            $table->string('repair_speed')->nullable();
            $table->string('drift_dim');
            $table->string('drift_insp');
            $table->string('cont_type')->nullable();
            $table->string('ship_method')->nullable();
            $table->string('device');
            $table->integer('gen_pdf');
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
        Schema::dropIfExists('orders');
    }
};
