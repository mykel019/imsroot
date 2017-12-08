<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InventoryMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subscriber_id');
            $table->string('product_id');
            $table->string('qty');
            $table->string('price_markdown');
            $table->string('price_reg');
            $table->string('price_ret');
            $table->string('price_ws');
            $table->string('price_ps');
            $table->string('warehouse_id');
            $table->string('branch_id');
            $table->string('threshold_limit');
            $table->string('reorder_qty');
            $table->string('active_price');
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
        Schema::drop('inventories');
    }
}
