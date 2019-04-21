<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_role', function (Blueprint $table) {
            $table->integer('permission_id')->unsigned(); //Refering to the permission_id in the user table
            $table->integer('role_id')->unsigned(); //Refering to the role_id in the user table

            $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade'); //This points out where the permission_id is being accessed from which is in the users table
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade'); //This points out where the role_id is being accessed from which is in the users table

            $table->primary(['permission_id', 'role_id']);
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
        Schema::drop('permission_role');

    }
}
