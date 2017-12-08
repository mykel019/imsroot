<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class POSTransactionsMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pos_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subscriber_id');
            $table->integer('location_id');
            $table->integer('user_id');
            $table->string('terminal');
            $table->string('customer_name');
            $table->string('or_number');
            $table->string('tr_number');
            $table->string('ref_tr_number');
            $table->float('totla_tender');
            $table->float('total_due');
            $table->integer('total_return');
            $table->integer('discount_id');
            $table->integer('discount_amount');
            $table->float('vat');
            $table->float('vat_sale');
            $table->float('vat_exempt');
            $table->float('vat_exempt_sale');
            $table->float('zero_rated_sale');
            $table->integer('transaction_type');
            $table->string('transaction_type_text');
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
        Schema::drop('pos_transactions');
    }
}
