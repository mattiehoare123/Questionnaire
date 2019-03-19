<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $fillable = [
      'id',
      'questionnaire_id',
      'number',
      'question',
      'required'
    ];
}
