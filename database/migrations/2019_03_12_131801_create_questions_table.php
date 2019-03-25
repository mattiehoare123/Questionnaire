<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('questionnaires_id')->unsigned()->default(0);
            //$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('number')->nullable();
            $table->longText('question');
            $table->boolean('required')->default(false);//Set the default value to false for required
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
        Schema::dropIfExists('questions');
    }
}
