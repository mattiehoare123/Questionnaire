<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $fillable = [
      'id',
      'questionnaires_id',
      'number',
      'question',
      'required'
    ];

    public function questionnaires()
    {
      return $this->belongsTo('App\Questionnaires', 'questionnaires_id');
    }
}
