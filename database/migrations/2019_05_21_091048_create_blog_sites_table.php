<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_sites', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Blog_name');
            $table->string('Blog_link');
            $table->text('Blog_desc');
            $table->string('Blog_image')->nullable();
            $table->text('Blog_keywords');
            $table->text('Blog_desctwo');
            $table->integer('Blog_active')->default(1);
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
        Schema::dropIfExists('blog_sites');
    }
}
