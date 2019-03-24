<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Add Choices</h1>
    {!! Form::open(array('action' => 'ChoiceController@store', 'id' => 'createChoice')) !!}
            {{ csrf_token() }}
        <div class="row large-12 columns">
            {!! Form::label('choice', 'Choice:') !!}
            {!! Form::text('choice', null, ['class' => 'large-8 columns']) !!}
        </div>
        <div class="row large-4 columns">
            {!! Form::submit('Submit', ['class' => 'button']) !!}
        </div>
    {!! Form::close() !!}
  </body>
</html>
