<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReturnDetailsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subscriber_id');
            $table->integer('location_id');
            $table->integer('product_id');
            $table->string('pos_invr_id');
            $table->string('pos_transaction_id');
            $table->integer('qty');
            $table->float('total');
            $table->float('is_percentage');
            $table->float('discount_value');
            $table->float('discount_amount');
            $table->float('vat');
            $table->float('vat_sale');
            $table->float('vat_exempt');
            $table->float('vat_exempt_sale');
            $table->float('zero_rated_sale');
            $table->string('required_fields');
            $table->float('return_total');
            $table->integer('return_qty');
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
        Schema::drop('return_details');
    }
}
