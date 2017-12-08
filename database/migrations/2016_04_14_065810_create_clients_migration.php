<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
           $table->integer('subscriber_id');
            $table->string('name');
            $table->string('company');
            $table->string('email');
            $table->string('phone');
            $table->string('fax');
            $table->string('account_manager');
            $table->string('contact_person');
            $table->string('payment_terms');
            $table->string('bill_addr1');
            $table->string('bill_addr2');
            $table->string('bill_city');
            $table->string('bill_province');
            $table->string('bill_postal');
            $table->string('bill_country');
            $table->string('ship_addr1');
            $table->string('ship_addr2');
            $table->string('ship_city');
            $table->string('ship_province');
            $table->string('ship_postal');
            $table->string('ship_country');
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
        Schema::drop('clients');
    }
}
