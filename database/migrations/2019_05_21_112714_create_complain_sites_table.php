<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComplainSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complain_sites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('complain_name');
            $table->string('complain_reason');
            $table->string('complain_desc');
            $table->string('complain_image_one');
            $table->string('complain_image_two')->nullable();
            $table->string('complain_image_three')->nullable();
            $table->string('complain_replay')->nullable();
            $table->string('complain_replay_image')->nullable();
            $table->integer('complain_active')->default(1);
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
        Schema::dropIfExists('complain_sites');
    }
}
