<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subscriber_id');
            $table->string('name');
            $table->string('biz_nature');
            $table->string('tin_no');
            $table->string('contact_details');
            $table->string('vat_reg');
            $table->string('biz_type');
            $table->string('logo');
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
        Schema::drop('companies');
    }
}
