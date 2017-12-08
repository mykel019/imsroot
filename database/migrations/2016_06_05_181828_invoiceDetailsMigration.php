<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InvoiceDetailsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subscriber_id');
            $table->integer('location_id');
            $table->integer('product_id');
            $table->string('pos_invd_id');
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
        Schema::drop('invoice_details');
    }
}
