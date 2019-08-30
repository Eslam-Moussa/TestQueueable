<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoredCurrentProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stored_current_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pro_store_id')->unsigned();
            $table->foreign('pro_store_id')->references('id')->on('product_stores');
            $table->integer('new_current');
            $table->integer('delete_from_table')->default(0);
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
        Schema::dropIfExists('stored_current_products');
    }
}
