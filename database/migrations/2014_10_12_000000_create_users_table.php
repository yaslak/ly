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

            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('password');

            $table->string('first_name', 15)->nullable();
            $table->string('last_name', 15)->nullable();
            $table->date('dtn')->nullable();
            $table->string('sex',10)->nullable();
            $table->string('address',100)->nullable();
            $table->string('house_nbr',10)->nullable();
            $table->string('city',50)->nullable();
            $table->string('tel')->nullable()->unique();
            $table->integer('is_admin')->unsigned()->nullable();

            $table->integer('photo_profil_id')->unsigned()->index()->unique()->nullable();
            $table->integer('photo_cover_id')->unsigned()->index()->unique()->nullable();
            $table->integer('recover_id')->unsigned()->index()->unique()->nullable();
            $table->integer('society_id')->unsigned()->index()->nullable();
            $table->integer('post_id')->unsigned()->index()->unique()->nullable();

            $table->rememberToken();

            $table->timestamps();

            $table->foreign('photo_profil_id')->references('id')->on('images');
            $table->foreign('photo_cover_id')->references('id')->on('images');
            $table->foreign('recover_id')->references('id')->on('recovers');
            $table->foreign('society_id')->references('id')->on('societies');
            $table->foreign('post_id')->references('id')->on('posts');
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
