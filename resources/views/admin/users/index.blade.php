@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<section>
    <h1>Users</h1>
    <a href="users/create" class="hollow button button success">Add User</a>

    @if (session('added'))
    <div class="callout success" data-closable>
      {{session('added')}}
      <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif

    @if (session('edit'))
    <div class="callout success" data-closable>
      {{session('edit')}}
      <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif

    @if (session('delete'))
    <div class="callout alert" data-closable>
      {{session('delete')}}
      <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif

      @if (isset($user))     {{--Check that all the data is being passed over--}}

      <table>
        <thead>
          <tr>
            <td>Name</td>
            <td>Email</td>
            <td>Role</td>
            <td>Edit</td>
            <td>Delete</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              @foreach ($user as $user)         {{--If the data is being passed over show all the questionnaire titles--}}
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td>
                @foreach($user->roles as $role)
                    <li>{{ $role->label }}</li>
                @endforeach
              </td>
              <td><a href="users/{{$user->id}}/edit" class="hollow button warning">Edit</a></td>
              <td>
                {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id]]) !!}
                {!! Form::submit('Delete', ['class' => 'hollow alert button']) !!}
                {!! Form::close() !!}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @else {{--If no data is being passed over or no questionnaires have been made this show--}}
        <p>No users yet</p>
        @endif
      </section>
@endsection
