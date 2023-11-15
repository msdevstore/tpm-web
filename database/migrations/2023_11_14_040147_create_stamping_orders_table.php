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
        Schema::create('stamping_orders', function (Blueprint $table) {
            $table->id();
            $table->string('job');
            $table->integer('customer_id');
            $table->string('part');
            $table->integer('setup_op')->default(0);
            $table->double('dimple_depth1')->default(0);
            $table->double('dimple_depth2')->default(0);
            $table->double('dimple_depth3')->default(0);
            $table->double('dimple_depth4')->default(0);
            $table->double('dimple_depth5')->default(0);
            $table->integer('rouselle')->default(0);
            $table->integer('rouselle_alt')->default(0);
            $table->integer('niagara')->default(0);
            $table->integer('niagara_alt')->default(0);
            $table->integer('seyi')->default(0);
            $table->integer('seyi_alt')->default(0);
            $table->integer('blank_area')->default(0);
            $table->integer('blank_area_alt')->default(0);
            $table->integer('cycles')->default(0);
            $table->integer('linear_feet')->default(0);
            $table->double('strip')->default(0);
            $table->double('strip_alt')->default(0);
            $table->string('mill_job');
            $table->integer('mill_cycles')->default(0);
            $table->string('remarks');
            $table->tinyInteger('test_cycles')->default(0);
            $table->string('press');
            $table->tinyInteger('has_started')->default(0);
            $table->dateTime('start_time');
            $table->tinyInteger('has_finished')->default(0);
            $table->dateTime('finish_time');
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
        Schema::dropIfExists('stamping_orders');
    }
};
