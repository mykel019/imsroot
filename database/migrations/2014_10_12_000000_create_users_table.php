<?php

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
            $table->integer('subscriber_id');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('title');
            $table->string('fname');
            $table->string('lname');
            $table->string('mname');
            $table->string('suffix');
            $table->string('birthdate');
            $table->string('contact_details');
            $table->integer('position_id');
            $table->integer('user_level_id');
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
