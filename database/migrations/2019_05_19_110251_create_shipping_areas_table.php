<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_areas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('shipping_id')->unsigned();
            $table->foreign('shipping_id')->references('id')->on('shipping_companis');
            $table->unsignedBigInteger('ship_area_id')->unsigned();
            $table->foreign('ship_area_id')->references('id')->on('areas');
            $table->integer('delete_from_table')->default(0);
            $table->integer('ship_area_active')->default(1);
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
        Schema::dropIfExists('shipping_areas');
    }
}
