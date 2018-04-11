<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecoversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recovers', function (Blueprint $table) {
            $table->increments('id');

            $table->boolean('email');
            $table->string('token',100)->nullable();
            $table->string('response')->nullable();

            $table->integer('question_secrete_id')->unsigned()->index()->nullable();

            $table->timestamps();

            $table->foreign('question_secrete_id')->references('id')->on('secret_questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recovers');
    }
}
