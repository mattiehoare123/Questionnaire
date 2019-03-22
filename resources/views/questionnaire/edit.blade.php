<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title></title>
  </head>
  <body>
    <h1>Edit Questionnaire - {{$questionnaires->title}}</h1>

    {!! Form::model($questionnaires, ['method' => 'PATCH', 'url' => 'questionnaire/', $questionnaires->id]) !!}
            {{ csrf_token() }}
        <div class="row large-12 columns">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class' => 'large-8 columns']) !!}
        </div>

        <div class="row large-12 columns">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::text('description', null, ['class' => 'large-8 columns']) !!}
        </div>

        <div class="row large-4 columns">
            {!! Form::submit('Submit', ['class' => 'button']) !!}
        </div>
    {!! Form::close() !!}

  </body>
</html>
