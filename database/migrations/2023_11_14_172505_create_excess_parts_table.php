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
        Schema::create('excess_parts', function (Blueprint $table) {
            $table->id();
            $table->integer('job');
            $table->integer('customer_id');
            $table->string('part');
            $table->integer('excess_qty');
            $table->dateTime('date_produced');
            $table->string('los');
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
        Schema::dropIfExists('excess_parts');
    }
};
