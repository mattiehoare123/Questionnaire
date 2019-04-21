<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    //$fillable is an arry that will contain the fields below that i want to set as mass-assignable
    protected $fillable = [
      'id',
      'question_id',
      'choice_id',
      'responses'
    ];
    //A response belongs to a question
    public function question()
    {
      return $this->belongsTo('App\Question');
    }
    //A reponse belongs to a choice
    public function choice()
    {
      return $this->belongsTo('App\Choice');
    }
}
