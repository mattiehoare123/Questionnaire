<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questionnaires extends Model
{
    //$fillable is an arry that will contain the fields below that i want to set as mass-assignable
    protected $fillable = [
      'id',
      'user_id',
      'title',
      'description',
      'ethical',
  ];
  //A questionnaire has many questions
  public function questions()
  {
    return $this->hasMany('App\Question');
  }
  //A questionnaire belongs to a user 
  public function user()
  {
    return $this->belongsTo('App\User');
  }

}
