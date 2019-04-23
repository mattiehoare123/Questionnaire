@extends('layouts.master')<!--Telling the view it's a child of the master layout by using extends-->

@section('title', 'Dashboard')<!--Linking the title to the title yeild in the master template linking it with the name and giving it a parameter -->

@section('content')<!--This calls the yeild and everything between the section will be inserted into the position of yeild-->
    <h1 class="heading">Edit User - {{$user->name}}</h1><!--Display the user name that is being edited-->

    @include ('errors/errorlist')<!--Include the error code if any occur-->
    <!--Find and load the user->id data into the form-->
    {!! Form::model($user, ['url' => 'admin/users/'. $user->id]) !!}
    @method('PATCH')
    @csrf
    @include('partials/userform')<!--Include the user form-->
    <div class="columns small-12 large-12">
        {!! Form::label('roles', 'Roles:') !!}
        <!--Loop through the roles and display all the roles made-->
        @foreach($roles as $role)
          <p>
          {{ Form::label($role->name) }}
          <!--Checkbox to select what role the user has-->
          {{ Form::checkbox('role[]', $role->id, $user->roles->contains($role->id), ['id' => $role->id]) }}
        </p>
        @endforeach
    </div>
    <div class="columns small-8 large-6">
      {!! Form::submit('Update', ['class' => 'button']) !!}<!--Send the form to the update method when clicked upon-->
      {!! Form::close() !!}
    </div>
@endsection
