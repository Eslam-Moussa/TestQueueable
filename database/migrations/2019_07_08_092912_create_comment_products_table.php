<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comment_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('comment_name');
            $table->string('comment_mail');
            $table->integer('comment_rate');
            $table->string('comment_message');
            $table->string('comment_title');
            $table->integer('comment_show')->default(1);
            $table->integer('comment_active')->default(1);
            $table->integer('comment_deleted')->default(1);
            $table->unsignedBigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('product_sites');
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
        Schema::dropIfExists('comment_products');
    }
}
