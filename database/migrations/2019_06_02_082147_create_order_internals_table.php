<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderInternalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_internals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order_number'); 
            $table->date('order_date');
            $table->string('order_admin_name');
            $table->string('order_user_id');
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
        Schema::dropIfExists('order_internals');
    }
}
