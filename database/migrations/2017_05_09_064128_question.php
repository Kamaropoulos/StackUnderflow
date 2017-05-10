<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Question extends Migration
{
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {

            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('uid');
            $table->string('title');
            $table->text('body');
            $table->string('tags')->nullable();
            $table->integer('views')->default(0);
            $table->integer('accepted_aid')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('uid')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
