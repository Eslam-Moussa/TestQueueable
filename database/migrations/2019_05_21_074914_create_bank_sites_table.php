<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_sites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Bank_name');
            $table->string('Bank_owner');
            $table->string('Bank_number_id');
            $table->string('Bank_logo');
            $table->integer('Bank_active')->default(1);
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
        Schema::dropIfExists('bank_sites');
    }
}
