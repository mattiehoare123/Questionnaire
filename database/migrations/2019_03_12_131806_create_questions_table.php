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
            $table->increments('id');//Incremeents meaing each id will go up by 1
            $table->integer('questionnaires_id')->unsigned()->default(0); //Makes sure the data will be postivie by using ->unsigned()
            $table->foreign('questionnaires_id')->references('id')->on('questionnaires')->onDelete('cascade'); //If questionnaires is deleted then delete all the questions that belong to it
            $table->longText('question'); //Question which is longtext as some user's user may be lengthy
            $table->boolean('required'); //This is a boolean if the question is required yes or no
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
