<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOldPasswordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('old_passwords', function (Blueprint $table) {
            $table->increments('id');

            $table->string('password');
            $table->date('created_at');

            $table->integer('recover_id')->unsigned()->index();

            $table->foreign('recover_id')->references('id')->on('recovers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('old_passwords');
    }
}
