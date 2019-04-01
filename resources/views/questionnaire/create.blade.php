<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title></title>
  </head>
  <body>
    <h1>New Questionnaire</h1>
    {!! Form::open(array('action' => 'QuestionnaireController@store', 'id' => 'createTitle')) !!}
    @csrf
    <!--This is a hidden field which is required in the questionnaire table which is a foregin key of user_id so therefore
    to pass to the user id i have used Auth::user()->id which gets the current users id logged in and passes it to the controller store method then model--->
    {!! Form::hidden('user_id', Auth::user()->id ) !!}

        <div class="row large-12 columns">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class' => 'large-8 columns']) !!}
        </div>

        <div class="row large-12 columns">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::text('description', null, ['class' => 'large-8 columns']) !!}
        </div>

        <div class="row large-12 columns">
            {!! Form::label('ethical', 'Ethical Statement:') !!}
            {!! Form::text('ethical', null, ['class' => 'large-8 columns']) !!}
        </div>


        <div class="row large-4 columns">
            {!! Form::submit('Submit', ['class' => 'button']) !!}
        </div>

    {!! Form::close() !!}

  </body>
</html>
