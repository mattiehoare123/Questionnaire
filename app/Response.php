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

    public function question()
    {
      return $this->belongsTo('App\Question');
    }

    public function choice()
    {
      return $this->belongsTo('App\Choice');
    }
}
