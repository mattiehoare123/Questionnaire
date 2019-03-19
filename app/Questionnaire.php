<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    //
    protected $fillable = [
      'id',
      'user_id',
      'name',
      'description',
      'date_created',
      'last_updated'
  ]
}
