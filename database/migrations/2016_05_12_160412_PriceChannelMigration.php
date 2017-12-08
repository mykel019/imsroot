<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PriceChannelMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_channels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subscriber_id');
            $table->integer('product_id');
            $table->integer('location_id');
            $table->string('name');
            $table->string('price_reg');
            $table->string('price_ret');
            $table->string('price_ws');

            $table->string('price_reg_disc');
            $table->string('price_ret_disc');
            $table->string('price_ws_disc');
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
        Schema::drop('price_channels');
    }
}
