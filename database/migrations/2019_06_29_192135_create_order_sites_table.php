<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_sites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order_number'); 
            $table->string('order_user_id');
            $table->string('order_product_count');
            $table->string('order_total');
            $table->integer('order_status')->default(0);
            $table->integer('order_active')->default(1);
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
        Schema::dropIfExists('order_sites');
    }
}
