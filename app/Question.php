<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //$fillable is an arry that will contain the fields below that i want to set as mass-assignable
    protected $fillable = [
      'id',
      'questionnaires_id',
      'question',
      'required'
    ];
    //A question belongs to an questionnaire
    public function questionnaires()
    {
      return $this->belongsTo('App\Questionnaires');
    }
    //A question has many choices
    public function choice()
    {
      return $this->hasMany('App\Choice');
    }
    //A question has many responses 
    public function response()
    {
      return $this->hasMany('App\Response');
    }
}
