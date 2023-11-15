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
        Schema::create('mat_reqs', function (Blueprint $table) {
            $table->id();
            $table->string('customer')->nullable();
            $table->string('part');
            $table->integer('quantity')->nullable();
            $table->double('dim')->nullable();
            $table->double('length')->nullable();
            $table->string('pattern')->nullable();
            $table->double('holes')->nullable();
            $table->double('centers')->nullable();
            $table->integer('gage')->nullable();
            $table->double('strip')->nullable();
            $table->tinyInteger('is_od');
            $table->string('po')->nullable();
            $table->string('material')->nullable();
            $table->double('density');
            $table->string('weight_bs')->nullable();
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
        Schema::dropIfExists('mat_reqs');
    }
};
