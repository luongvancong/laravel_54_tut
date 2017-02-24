<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function($table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->text('teaser')->nullable();
            $table->text('content')->nullable();
            $table->integer('price')->nullable();
            $table->integer('promotion_price')->nullable();
            $table->integer('category_id')->default(0);
            $table->tinyInteger('hot')->default(0);
            $table->tinyInteger('active')->default(1);
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
