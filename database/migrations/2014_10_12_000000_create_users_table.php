<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');

            $table->bigInteger('identification_number')->unique();
            $table->text('driver_license')->unique()->nullable();
            $table->bigInteger('phone')->nullable();
            $table->string('email')->nullable();
            $table->longText('photo')->nullable();
            $table->string('address')->nullable();

            $table->string('role');
            $table->string('username')->nullable();
            $table->string('password')->nullable();

            $table->rememberToken();
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
        Schema::drop('users');
    }
}
