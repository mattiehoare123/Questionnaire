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

    public function questionnaires()
    {
      return $this->belongsTo('App\Questionnaires', 'questionnaires_id');
    }
}
