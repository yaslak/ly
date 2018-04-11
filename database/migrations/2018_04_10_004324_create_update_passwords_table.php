<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpdatePasswordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('update_passwords', function (Blueprint $table) {
            $table->increments('id');

            $table->boolean('sq')->nullable();
            $table->string('token')->unique();
            $table->string('code');

            $table->integer('recover_id')->unsigned()->index()->unique();

            $table->timestamps();

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
        Schema::dropIfExists('update_passwords');
    }
}
