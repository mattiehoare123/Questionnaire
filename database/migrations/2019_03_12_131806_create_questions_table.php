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
            $table->integer('questionnaires_id')->unsigned();
            $table->foreign('questionnaires_id')->references('id')->on('questionnaires')->onDelete('cascade');
            $table->longText('question');
            $table->boolean('required')->default(false);
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
