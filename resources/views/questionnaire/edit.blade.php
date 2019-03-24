<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title></title>
  </head>
  <body>
    <h1>Edit - {{$questionnaires->title}} Welcome Page</h1>
    <!--If there are any errors loop through the errors and display them to the user-->
    @if ($errors->any())
        <div>
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!--Edit Form-->
    {!! Form::model($questionnaires, ['url' => 'questionnaire/'. $questionnaires->id]) !!}
    <!-- Laravel did not support PATCH when placed above so therefore used a method called form spoof which hids the method to spoof the HTTP which worked below-->
            @method('PATCH')
            @csrf
            {{ csrf_token() }}
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
            {!! Form::submit('Update', ['class' => 'button']) !!}
        </div>
    {!! Form::close() !!}

  </body>
</html>
