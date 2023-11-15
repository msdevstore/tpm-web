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
        Schema::create('fractions', function (Blueprint $table) {
            $table->id();
            $table->double('decimal');
            $table->string('fraction')->default('');
            $table->string('fractionN');
            $table->string('fractionD');
            $table->string('centers');
            $table->string('holes');
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
        Schema::dropIfExists('fractions');
    }
};
