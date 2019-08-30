<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderInternalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_internal_details', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->integer('stored_id'); 
            $table->integer('prodect_id');
            $table->integer('product_parcode');
            $table->integer('color_id');
            $table->integer('style_id');
            $table->integer('size_id');
            $table->integer('number_size');
            $table->integer('pro_count');
            $table->integer('pro_price');
            $table->integer('pro_price_total');
            $table->integer('order_details_active')->default(1);
            $table->integer('delete_from_table')->default(0);
            $table->unsignedBigInteger('order_internal_id')->unsigned();
            $table->foreign('order_internal_id')->references('id')->on('order_internals');
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
        Schema::dropIfExists('order_internal_details');
    }
}
