@extends('layouts.master')<!--Telling the view it's a child of the master layout by using extends-->

@section('title', 'Dashboard')<!--Linking the title to the title yeild in the master template linking it with the name and giving it a parameter -->

@section('content')<!--This calls the yeild and everything between the section will be inserted into the position of yeild-->
  <article class="row">
    <h1 class="columns small-8 large-8">Users</h1>
    <div class="columns small-4 large-2">
      <a id="addUser" href="users/create" class="hollow button button success">Add User</a><!--Take the user to the user create view when clicked upon-->
    </div>
  </article>

  @if (session('added'))<!--If the session has a message which has been passed with the view then display it-->
  <section class="callout success" data-closable>
    {{session('added')}}<!--Display the message-->
    <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
      <span aria-hidden="true">&times;</span>
    </button>
  </section>
  @endif

  @if (session('edit'))
  <section class="callout success" data-closable>
    {{session('edit')}}
    <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
      <span aria-hidden="true">&times;</span>
    </button>
  </section>
  @endif

  @if (session('delete'))
  <section class="callout alert" data-closable>
    {{session('delete')}}
    <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
      <span aria-hidden="true">&times;</span>
    </button>
  </section>
  @endif

  @if (isset($user))   <!--Check that all the data is being passed over-->
  <div class="row">
    <div class="columns">
      <div class="table-scroll"><!--Make the table scrollabe on mobile devices-->
        <table>
          <thead>
            <tr>
              <td>Name</td><!--Table headers-->
              <td>Email</td>
              <td>Role</td>
              <td>Edit</td>
              <td>Delete</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                @foreach ($user as $user)   <!--Loop through the users array and show each user-->
                <td>{{$user->name}}</td><!--Display the user name-->
                <td>{{$user->email}}</td><!--Display the user email-->
                <td>
                  @foreach($user->roles as $role)<!--Loop through the data from by the many to many relation-->
                  <ul>
                      <li>{{ $role->label }}</li><!--Display the user role-->
                    </ul>
                  @endforeach
                </td>
                <!--Take the user to the edit view passing over the $id to get the users data-->
                <td><a href="users/{{$user->id}}/edit" class="clear button warning">Edit</a></td>
                <td>
                  <!--Created a form and set the method to delete and then take it to the destory method in the user controller passing it the user->id-->
                  {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id]]) !!}
                  {!! Form::submit('Delete', ['class' => 'clear alert button']) !!}
                  {!! Form::close() !!}
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  @else <!--If no users are being passed through then display this message-->
    <p>No Users Yet</p>
  @endif
@endsection
