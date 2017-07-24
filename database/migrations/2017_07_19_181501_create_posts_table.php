<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('p_id');
            $table->string('p_title');
            $table->string('p_alias');
            $table->string('p_description')->nullable();
            $table->text('p_content');
            $table->string('p_image');
            $table->string('p_link_video')->nullable();
            $table->string('p_link_youtube')->nullable();
            $table->integer('p_createuser');
            $table->integer('p_modifyuser');
            $table->integer('p_order');
            $table->boolean('p_state');

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
        //
        Schema::dropIfExists('posts');
    }
}
