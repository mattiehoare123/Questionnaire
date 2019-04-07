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
  ];

  public function question()
  {
    return $this->hasMany('App\Question');
  }
}
