<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaires extends Model
{
    //
    protected $fillable = [
      'id',
      'user_id',
      'title',
      'description',
      'ethical',
      'date_created',
      'last_updated'
  ];
}
