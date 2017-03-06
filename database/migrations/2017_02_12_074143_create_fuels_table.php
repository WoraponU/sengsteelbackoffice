<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('truck_driver');
            $table->integer('license_plate');
            $table->date('fuel_date');

            $table->string('gas_employee');
            $table->string('gas_type');
            $table->integer('last_number_car');
            $table->integer('present_number_car');
            $table->float('liter', 10, 2);
            $table->integer('total_distance');
            $table->float('gas_per_distance', 10, 2);
            $table->mediumText('note')->nullable();

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
        Schema::drop('fuels');
    }
}
