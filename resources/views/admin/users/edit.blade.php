@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <h1>Edit User - {{$user->name}}</h1>

    @include ('errors/errorlist')

    {!! Form::model($user, ['url' => 'admin/users/'. $user->id]) !!}
    @method('PATCH')
    @csrf
    <div class="columns large-12">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null) !!}
        </div>
        <div class="columns large-12">
            {!! Form::label('email', 'Email:') !!}
            {!! Form::text('email', null) !!}
        </div>
        <div class="columns large-12">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::text('password', null) !!}
        </div>
        <div class="columns large-12">
          {!! Form::label('roles', 'Roles:') !!}
          @foreach($roles as $role)
              {{ Form::label($role->name) }}
              {{ Form::checkbox('role[]', $role->id, $user->roles->contains($role->id), ['id' => $role->id]) }}
          @endforeach
      </div>
      <div class="columns large-12">
            {!! Form::submit('Update', ['class' => 'button']) !!}
        </div>
    {!! Form::close() !!}
@endsection
