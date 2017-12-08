<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
           $table->integer('subscriber_id');
            $table->string('code');
            $table->string('sku');
            $table->string('stock_code');
            $table->string('supplier_code');
            $table->string('barcode');
            $table->string('name');
            $table->string('category');
            $table->string('brand');
            $table->string('department');
            $table->string('description');
            $table->string('supplier_id');
            $table->string('cost');
            $table->string('uom');
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
        Schema::drop('products');
    }
}
