<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subscriber_id');
            $table->string('company');
            $table->string('name');
            $table->string('contact_person');
            $table->string('payment_terms');
            $table->string('addr1');
            $table->string('addr2');
            $table->string('city');
            $table->string('province');
            $table->string('postal');
            $table->string('country');
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
        Schema::drop('suppliers');
    }
}
