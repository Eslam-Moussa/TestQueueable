<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductSiteDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void 
     */
    public function up()
    {
        Schema::create('product_site_datas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('Sector_price'); 
            $table->integer('Maximum_one'); 
            $table->integer('Wholesale_price'); 
            $table->integer('Maximum_two'); 
            $table->integer('Wholesale_price_two'); 
            $table->integer('Maximum_three'); 
            $table->text('Main_bar_code'); 
            $table->text('Main_bar_code_two'); 
            $table->integer('datas_active')->default(1);
            $table->integer('delete_from_table')->default(0);
            $table->unsignedBigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('product_sites');
            $table->unsignedBigInteger('product_sizes_id')->unsigned();
            $table->foreign('product_sizes_id')->references('id')->on('product_site_sizes');
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
        Schema::dropIfExists('product_site_datas');
    }
}
