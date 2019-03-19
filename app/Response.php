<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    //
    protected $fillable = [
      'id',
      'question_id',
      'choice_id',
      'responses'
    ];
}
