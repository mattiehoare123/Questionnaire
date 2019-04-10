@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<div class="columns large-12">
    <h1>Add User</h1>

    @if ($errors->any())
        <div>
          <p>Error User already exists!</p>
        </div>
    @endif

    {!! Form::open(array('action' => 'UserController@store', 'id' => 'createUser')) !!}
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
            {!! Form::submit('Submit', ['class' => 'button']) !!}
        </div>
      </div>
    {!! Form::close() !!}
@endsection
