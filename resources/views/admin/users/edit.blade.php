<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    @include('admin/includes.adminnav')

    <h1>Edit User - {{$user->name}}</h1>

    @if ($errors->any())
        <div>
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::model($user, ['url' => 'admin/users/'. $user->id]) !!}
    @method('PATCH')
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
        <div>
          {!! Form::label('roles', 'Roles:') !!}
          @foreach($roles as $role)
              {{ Form::label($role->name) }}
              {{ Form::checkbox('role[]', $role->id, $user->roles->contains($role->id), ['id' => $role->id]) }}
          @endforeach
      </div>
        <div class="row large-4 columns">
            {!! Form::submit('Update', ['class' => 'button']) !!}
        </div>
    {!! Form::close() !!}
  </body>
</html>
