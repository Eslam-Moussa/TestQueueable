<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('user_secondname')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('user_phone');
            $table->integer('permission_id');
            $table->text('user_photo');
            $table->integer('country_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('area_id')->nullable();
            $table->text('user_address')->nullable();
            $table->integer('clienttyp_id')->nullable();
            $table->integer('time_close')->nullable();
            $table->integer('time_cart')->nullable();
            $table->integer('payment_methoud')->nullable();
            $table->integer('user_social_id')->nullable();
            $table->integer('user_type');
            $table->integer('user_active')->default(1);
            $table->integer('delete_from_table')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
