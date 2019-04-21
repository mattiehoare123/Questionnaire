<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responses', function (Blueprint $table) {
            $table->increments('id');//Incremeents meaing each id will go up by 1
            $table->integer('question_id')->unsigned()->default(0); //Refering to the question_id in the question table
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade'); //This points out where the id above is being accessed from
            $table->integer('choice_id')->unsigned()->default(0); //Refering to the choice_id in the choice table
            $table->foreign('choice_id')->references('id')->on('choices')->onDelete('cascade'); //This points out where the id above is being accessed from
            $table->string('responses'); //String always accepts an integer which may be included in some repsonses
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
        Schema::dropIfExists('responses');
    }
}
