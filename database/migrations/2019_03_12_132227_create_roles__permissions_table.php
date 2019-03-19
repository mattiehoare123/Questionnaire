<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles__permissions', function (Blueprint $table) {
          $table->integer('role_id');
          $table->integer('permissions_id');//->Unsigned ensures the data will always be postivie

          //$table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
          //$table->foreign('permissions_id')->references('id')->on('permissions')->onDelete('cascade');

          //$table->primary(['role_id', 'permissions_id']);
    });
}
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role__permissions');
    }
}
