<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Edit Choice - {{$choice->choice}}</h1>
    {!! Form::model($choice, ['url' => 'choice/'. $choice->id]) !!}
    <!-- Laravel did not support PATCH when placed above so therefore used a method called form spoof which hids the method to spoof the HTTP which worked below-->
            @method('PATCH')
            @csrf
            <div class="row large-12 columns">
                {!! Form::label('choice', 'Choice:') !!}
                {!! Form::text('choice', null, ['class' => 'large-8 columns']) !!}
            </div>
            <div class="row large-12 columns">
                {!! Form::text('choice', null, ['class' => 'large-8 columns']) !!}
            </div>
            <div class="row large-4 columns">
                {!! Form::submit('Submit', ['class' => 'button']) !!}
            </div>
        {!! Form::close() !!}
  </body>
</html>
