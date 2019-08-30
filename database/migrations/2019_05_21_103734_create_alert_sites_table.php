<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlertSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alert_sites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('alert_title');
            $table->string('alert_desc');
            $table->integer('alert_active')->default(1);
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
        Schema::dropIfExists('alert_sites');
    }
}
