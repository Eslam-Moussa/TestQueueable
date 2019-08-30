<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSliderSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slider_sites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slider_title')->nullable();
            $table->text('slider_desc')->nullable();
            $table->string('slider_link')->nullable();
            $table->string('slider_image'); 
            $table->integer('slider_active')->default(1);
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
        Schema::dropIfExists('slider_sites');
    }
}
