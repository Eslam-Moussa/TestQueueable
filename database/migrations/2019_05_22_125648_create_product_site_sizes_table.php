<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSiteSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_site_sizes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('size_value_id'); 
            $table->integer('size_number');
            $table->string('size_value_open');
            $table->integer('size_active')->default(1);
            $table->integer('delete_from_table')->default(0);
            $table->unsignedBigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('product_sites');
            $table->unsignedBigInteger('product_color_id')->unsigned();
            $table->foreign('product_color_id')->references('id')->on('product_colors');
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
        Schema::dropIfExists('product_site_sizes');
    }
}
