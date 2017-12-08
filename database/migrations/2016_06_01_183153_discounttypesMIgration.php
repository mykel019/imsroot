<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DiscounttypesMIgration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subscriber_id');
            $table->string('code');
            $table->string('name');
            $table->string('disc_value');
            $table->boolean('is_active');
            $table->float('percentage');
            $table->tinyInteger('disc_target');
            $table->boolean('include_tax');
            $table->boolean('open_disc');
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
        Schema::drop('discount_types');
    }
}
