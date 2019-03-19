<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Role extends Model
{
    //
    protected $fillable = [
      'role_id',
      'user_id'
    ];
}
