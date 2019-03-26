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
            $table->increments('id');
            $table->integer('question_id')->unsigned()->default(0);
            //$table->foreign('question_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->integer('choice_id')->unsigned()->default(0);
            //$table->foreign('choice_id')->references('id')->on('choices')->onDelete('cascade');
            $table->string('responses');
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
