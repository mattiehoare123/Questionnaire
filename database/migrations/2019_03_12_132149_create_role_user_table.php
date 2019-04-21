<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
          $table->integer('role_id')->unsigned(); //Refering to the role_id in the roles table
          $table->integer('user_id')->unsigned(); //Refering to the user_id in the user table

          $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');//This points out where the role_id is being accessed from which is in the roles table
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');//This points out where the user_id is being accessed from which is in the users table

          $table->primary(['role_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public
    function down()
    {
        Schema::drop('role_user');

    }
}
