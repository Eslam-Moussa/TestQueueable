<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_stores', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('store_name');
            $table->text('store_address');
            $table->string('store_admin_name');
            $table->integer('store_active')->default(1);
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
        Schema::dropIfExists('main_stores');
    }
}
