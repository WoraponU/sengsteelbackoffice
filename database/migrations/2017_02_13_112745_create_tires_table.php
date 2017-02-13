<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tires', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('truck_driver');
            $table->integer('license_plate');
            $table->date('tire_date');

            $table->string('tire_employee');
            $table->string('type_of_tire');
            $table->string('brand_of_tire');
            $table->integer('price_per_unit');
            $table->integer('wage_per_unit');
            $table->longText('photo_tire');
            $table->string('section_of_tire');
            $table->integer('row_of_tire');
            $table->integer('number_of_tire');
            $table->string('quantity');
            $table->integer('total_distance');
            $table->integer('gas_per_distance');
            $table->string('note');

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
        Schema::drop('tires');
    }
}
