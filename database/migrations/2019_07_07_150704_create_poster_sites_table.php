<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosterSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poster_sites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title1_poster')->nullable();
            $table->string('link1_poster')->nullable();
            $table->string('desc1_poster')->nullable();
            $table->string('title2_poster')->nullable();
            $table->string('link2_poster')->nullable();
            $table->string('desc2_poster')->nullable();
            $table->string('title3_poster')->nullable();
            $table->string('link3_poster')->nullable();
            $table->string('desc3_poster')->nullable();
            $table->string('title4_poster')->nullable();
            $table->string('link4_poster')->nullable();
            $table->string('desc4_poster')->nullable();
            $table->string('image1_poster')->nullable();
            $table->string('image2_poster')->nullable();
            $table->string('image3_poster')->nullable();
            $table->string('image4_poster')->nullable();
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
        Schema::dropIfExists('poster_sites');
    }
}
