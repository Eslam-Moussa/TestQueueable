<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingCompanisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('shipping_companis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ship_name');
            $table->text('ship_address');
            $table->string('ship_admin_name');
            $table->string('ship_image');
            $table->integer('ship_active')->default(1);
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
        Schema::dropIfExists('shipping_companis');
    }
}
