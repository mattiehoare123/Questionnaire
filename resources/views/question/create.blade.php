<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    {!! Form::open(array('action' => 'QuestionController@store', 'id' => 'createQuestion')) !!}
            {{ csrf_token() }}
        <div class="row large-12 columns">
            {!! Form::label('question', 'Question:') !!}
            {!! Form::text('question', null, ['class' => 'large-8 columns']) !!}
        </div>
        <div class="row large-4 columns">
            {!! Form::submit('Submit', ['class' => 'button']) !!}
        </div>
    {!! Form::close() !!}
  </body>
</html>
