<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user__roles', function (Blueprint $table) {
          $table->integer('users_id');
          $table->integer('roles_id');

          //$table->foreign('users_id')->references('id')->on('roles')->onDelete('cascade');
          //$table->foreign('roles_id')->references('id')->on('users')->onDelete('cascade');

          //table->primary(['users_id', 'roles_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user__roles');
    }
}
