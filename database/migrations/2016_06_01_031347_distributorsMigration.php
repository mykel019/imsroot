<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DistributorsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distributors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subscriber_id');
            $table->string('name');
            $table->string('company');
            $table->string('contact_person');
            $table->string('addr1');
            $table->string('addr2');
            $table->string('city');
            $table->string('province');
            $table->string('country');
            $table->string('postal');
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
        Schema::drop('distributors');
    }
}
