<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientOrderNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_order_news', function (Blueprint $table) {
            $table->bigIncrements('id'); 
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
        Schema::dropIfExists('client_order_news');
    }
}
