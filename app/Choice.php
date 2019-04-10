<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    //
    protected $fillable = [
      'id',
      'question_id',
      'choice',
    ];

    public function question()
    {
      return $this->belongsTo('App\Question');
    }

    public function response()
    {
      return $this->hasMany('App\Response');
    }
}
