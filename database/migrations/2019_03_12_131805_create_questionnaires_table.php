<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionnairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnaires', function (Blueprint $table) {
            $table->increments('id'); //This column can be empty within the table
            $table->integer('user_id')->unsigned()->default(0); //Refering to the id in the user's table which will start at 0
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); //If the user is deleted then all the users questionnaire shall be deleted
            $table->string('title'); //Title which expects a string
            $table->string('description')->nullable(); //Nullable means that this column can be empty within the DB
            $table->longText('ethical')->nullable(); //This is long text as a ethical statment can be quite long so therefore a string is not suitable
            $table->timestamps(); //I will be able to access the date created and updated from this column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questionnaires');
    }
}
