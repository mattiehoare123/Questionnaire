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

  public function questions()
  {
    return $this->hasMany('App\Question');
  }
}
