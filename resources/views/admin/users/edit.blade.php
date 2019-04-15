@extends('layouts.master')<!--Telling the view it's a child of the master layout by using extends-->

@section('title', 'Dashboard')<!--Linking the title to the title yeild in the master template linking it with the name and giving it a parameter -->

@section('content')<!--This calls the yeild and everything between the section will be inserted into the position of yeild-->
    <h1>Edit User - {{$user->name}}</h1><!--Display the user name that is being edited-->

    @include ('errors/errorlist')<!--Include the error code if any occur-->
    <!--Find and load the user->id data into the form-->
    {!! Form::model($user, ['url' => 'admin/users/'. $user->id]) !!}
    @method('PATCH')
    @csrf
    @include('partials/userform')<!--Include the user form-->
    {!! Form::submit('Update', ['class' => 'button']) !!}<!--Send the form to the update method when clicked upon-->
    {!! Form::close() !!}
@endsection
