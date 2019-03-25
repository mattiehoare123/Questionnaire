<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    @if ($errors->any())
        <div>
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::open(array('action' => 'QuestionController@store', 'id' => 'createQuestion')) !!}
            {{ csrf_token() }}
        <div class="row large-12 columns">
            {!! Form::label('question', 'Question:') !!}
            {!! Form::text('question', null, ['class' => 'large-8 columns']) !!}
        </div>
        <div class="row large-12 columns">
          {!! Form::label('required', 'Required:') !!}
          <!--If the yes button is checked it will send the value true into the DB for the required question-->
          {!! Form::radio('required', true) !!}True
          {!! Form::radio('required', false) !!}False
        </div>
        <div class="row large-4 columns">
            {!! Form::submit('Submit', ['class' => 'button']) !!}
        </div>
    {!! Form::close() !!}
  </body>
</html>
