<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Users</h1>
    <a href="users/create">Add User</a>

    <!--If the controller has reirected with a flash message then this will display if the session names match-->
    @if (session('added'))
      <div class="alert alert-success">
        {{session('added')}}
      </div>
      @endif

    @if (session('updated'))
      <div class="alert alert-success">
        {{session('updated')}}
      </div>
      @endif

    <section>

      @if (isset($user))     {{--Check that all the data is being passed over--}}

      <ul>
        @foreach ($user as $user)         {{--If the data is being passed over show all the questionnaire titles--}}
          <a href="users/{{$user->id}}/edit">{{$user->name}}</a>
          <a href="users/{{$user->id}}/edit">Edit</a>
          @foreach($user->roles as $role)
              <li>{{ $role->label }}</li>
          @endforeach
          {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id]]) !!}
          {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
          {!! Form::close() !!}
          @endforeach
        </ul>
        @else {{--If no data is being passed over or no questionnaires have been made this show--}}
        <p>No users yet</p>
        @endif
      </section>

  </body>
</html>
