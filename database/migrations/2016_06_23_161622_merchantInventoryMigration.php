<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MerchantInventoryMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant_inventories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subscriber_id');
            $table->integer('manager_id');
            $table->integer('merchant_id');
            $table->integer('location_id');
            $table->integer('begin_inv_cases');
            $table->integer('begin_inv_pcs');
            $table->integer('delivery_cases');
            $table->integer('ending_inv_cases');
            $table->integer('ending_inv_pcs');
            $table->integer('returns_inv_cases');
            $table->integer('returns_inv_pcs');
            $table->integer('offtake_cases');
            $table->integer('offtake_pcs');
            $table->integer('osa_mon');
            $table->integer('osa_tue');
            $table->integer('osa_wed');
            $table->integer('osa_thu');
            $table->integer('osa_fri');
            $table->integer('osa_sat');
            $table->integer('osa_sun');
            $table->integer('total_osa');
            $table->integer('exp_m1');
            $table->integer('exp_m2');
            $table->integer('exp_m3');
            $table->integer('exp_m4');
            $table->integer('exp_m5');
            $table->integer('exp_m6');
            $table->float('srp');
            $table->datetime('app_created');
            $table->datetime('app_modified');
            $table->softDeletes();
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
        Schema::drop('merchant_inventories');
    }
}
