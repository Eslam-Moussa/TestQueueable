<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebSiteSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_site_settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('sit_title_ar')->nullable();
            $table->text('sit_address_ar')->nullable();
            $table->text('sit_phone')->nullable();
            $table->text('sit_mail')->nullable();
            $table->text('sit_open_ar')->nullable();
            $table->text('sit_mony')->nullable();
            $table->text('sit_footer_desc_ar')->nullable();
            $table->text('sit_logo_ar')->nullable();
            $table->text('sit_logofooter_ar')->nullable();
            $table->text('sit_favicon')->nullable();
            $table->text('sit_desc_ar')->nullable();
            $table->text('sit_keywords_ar')->nullable();
            $table->text('facebook')->nullable();
            $table->text('twitter')->nullable();
            $table->text('google')->nullable();
            $table->text('youtuob')->nullable();
            $table->text('instgram')->nullable();
            $table->text('snapchat')->nullable();
            $table->text('linked')->nullable();
            $table->text('whatsapp')->nullable();
            $table->text('lat')->nullable();
            $table->text('lng')->nullable();
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
        Schema::dropIfExists('web_site_settings');
    }
}
