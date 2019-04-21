<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  //A role belongs to many permissions 
  public function permissions() {
    return $this->belongsToMany(Permission::class);
  }
  //The sync ensures all the DB  are correct
  public function givePermissionTo(Permission $permission) {
    return $this->permission()->sync($permission);
  }
}
