<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintains', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('truck_driver');
            $table->integer('license_plate');
            $table->date('maintain_date');
            $table->string('maintain_employee');

            $table->mediumText('maintain_lists');
            $table->mediumText('wage_per_list');
            $table->mediumText('spare_per_list');
            $table->integer('total_wage');
            $table->integer('total_spare');
            $table->integer('amount_cost');
            $table->string('note')->nullable();

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
        Schema::drop('maintains');
    }
}
