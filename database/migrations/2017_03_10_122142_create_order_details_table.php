<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function($table) {
            $table->increments('id');
            $table->integer('order_id')->default(0)->nullable();
            $table->integer('product_id')->default(0)->nullable();
            $table->integer('quantity')->default(0)->nullable();
            $table->integer('price')->default(0)->nullable();
            $table->integer('money')->default(0)->nullable();
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
        Schema::drop('order_details');
    }
}
