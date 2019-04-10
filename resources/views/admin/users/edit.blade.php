@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <h1>Edit User - {{$user->name}}</h1>

    @include ('errors/errorlist')

    {!! Form::model($user, ['url' => 'admin/users/'. $user->id]) !!}
    @method('PATCH')
    @csrf
    @include('partials/userform')
      <div class="columns large-12">
            {!! Form::submit('Update', ['class' => 'button']) !!}
        </div>
    {!! Form::close() !!}
@endsection
