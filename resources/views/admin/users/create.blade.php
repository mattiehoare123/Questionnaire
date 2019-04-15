@extends('layouts.master')<!--Telling the view it's a child of the master layout by using extends-->

@section('title', 'Dashboard')<!--Linking the title to the title yeild in the master template linking it with the name and giving it a parameter -->

@section('content')<!--This calls the yeild and everything between the section will be inserted into the position of yeild-->
    <h1>Add User</h1>
    @include ('errors/errorlist')<!--Include the error code if any occur-->
    <!--Created a form which will send to the user controller store method-->
    {!! Form::open(array('action' => 'UserController@store', 'id' => 'createUser')) !!}
    @csrf
    @include('partials/userform')<!--Include the user form-->
    {!! Form::submit('Submit', ['class' => 'button']) !!}<!--Send the input to the controller store method when submitted-->
    {!! Form::close() !!}
@endsection
