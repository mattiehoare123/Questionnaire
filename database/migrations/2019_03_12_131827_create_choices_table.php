<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('choices', function (Blueprint $table) {
            $table->increments('id');//Incremeents meaing each id will go up by 1
            $table->integer('question_id')->unsigned()->default(0); //Refering to the question_id in the table question table
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade'); //If a question is deleted then delete all the choices that belong to it
            $table->string('choice'); //Choice which will accept a string value
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
        Schema::dropIfExists('choices');
    }
}
