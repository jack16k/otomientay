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
            $table->increments('id');
            $table->string('u_username')->unique();
            $table->string('u_email')->unique();
            $table->string('u_pass');
            $table->string('u_fullname');
            $table->string('u_avatar')->nullable();
            $table->string('u_face_token')->nullable();
            $table->string('u_token')->nullable();
            $table->boolean('u_state');
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
