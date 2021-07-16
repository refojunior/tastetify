<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name')->nullable();;
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();;
            $table->string('spotify_avatar')->nullable();
            $table->string('spotify_id');
            $table->string('spotify_url')->nullable();;
            $table->string('spotify_type')->nullable();
            $table->bigInteger('spotify_followers')->nullable();
            $table->text('spotify_token');
            $table->text('spotify_refresh_token');
            $table->string('spotify_country')->nullable();
            $table->string('spotify_product')->nullable();
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
