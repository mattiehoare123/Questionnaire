<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    //$fillable is an arry that will contain the fields below that i want to set as mass-assignable
    protected $fillable = [
      'id',
      'question_id',
      'choice',
    ];

    //A choice belongs to a question
    public function question()
    {
      return $this->belongsTo('App\Question');
    }

    //A choice has many resposes
    public function response()
    {
      return $this->hasMany('App\Response');
    }
}
