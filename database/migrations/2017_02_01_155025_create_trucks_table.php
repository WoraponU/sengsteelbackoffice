<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrucksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trucks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('license_plate');
            $table->string('owner')->nullable();
            $table->longText('photo')->nullable();

            $table->date('register_date');
            $table->date('annual_tax_date');

            $table->string('gasoline')->comment('น้ำมัน');
            $table->string('lubricator')->comment('น้ำมัน');
            $table->string('gear_box_oil')->comment('น้ำมัน');
            $table->string('final_gear_oil')->comment('น้ำมัน');

            $table->integer('row_of_wheel');
            $table->string('number_wheel_per_row');
            $table->integer('last_number_car');

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
        Schema::drop('trucks');
    }
}