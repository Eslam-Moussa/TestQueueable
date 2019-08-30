<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_stores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('color_id')->nullable(); 
            $table->integer('style_id')->nullable();
            $table->integer('size_id')->nullable();
            $table->integer('size_number')->nullable();
            $table->integer('stores_active')->default(1);
            $table->integer('delete_from_table')->default(0);
            $table->unsignedBigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('product_sites');
            $table->unsignedBigInteger('store_id')->unsigned();
            $table->foreign('store_id')->references('id')->on('main_stores');
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
        Schema::dropIfExists('product_stores');
    }
}
