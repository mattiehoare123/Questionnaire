<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Add User</h1>

    @if ($errors->any())
        <div>
          <p>Error User already exists!</p>
        </div>
    @endif

    {!! Form::open(array('action' => 'UserController@store', 'id' => 'createUser')) !!}
    @csrf
        <div class="row large-12 columns">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class' => 'large-8 columns']) !!}
        </div>
        <div class="row large-12 columns">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::text('email', null, ['class' => 'large-8 columns']) !!}
        </div>
        <div class="row large-12 columns">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::text('password', null, ['class' => 'large-8 columns']) !!}
        </div>
        <div class="row large-4 columns">
            {!! Form::submit('Submit', ['class' => 'button']) !!}
        </div>
    {!! Form::close() !!}
  </body>

</html>
