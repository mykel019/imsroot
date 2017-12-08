<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AccessModulesMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_modules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subscriber_id');
            $table->string('module');
            $table->string('description');
            $table->string('crud');
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
        Schema::drop('access_modules');
    }
}
