<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PosusersMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pos_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subscriber_id');
            $table->string('username');
            $table->string('password');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('addr1');
            $table->string('addr2');
            $table->string('city');
            $table->string('province');
            $table->string('postal');
            $table->string('country');
            $table->string('position_id');
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
        Schema::drop('pos_users');
    }
}
