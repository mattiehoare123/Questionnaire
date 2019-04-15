@extends('layouts.master')<!--Telling the view it's a child of the master layout by using extends-->

@section('title', 'Create Questionnaire')<!--Linking the title to the title yeild in the master template linking it with the name and giving it a parameter -->

@section('content')<!--This calls the yeild and everything between the section will be inserted into the position of yeild-->
    <section>
    <h1>New Questionnaire</h1>
    @include ('errors/errorlist')<!--Include the error code if any occur-->
    <!--Creates a form which will send to the Questionnaire store method-->
    {!! Form::open(array('action' => 'QuestionnaireController@store', 'id' => 'createTitle')) !!}
    @csrf
    <!--This is a hidden field which is required in the questionnaire table which is a foregin key of user_id so therefore
    to pass to the user id i have used Auth::user()->id which gets the current users id logged in and passes it to the controller store method then model--->
    {!! Form::hidden('user_id', Auth::user()->id ) !!}
    @include('partials/questionnaireform')<!--Include the questionnaire form-->
    {!! Form::submit('Submit', ['class' => 'button']) !!}<!--Send the input to the controller when this button is clicked-->
    {!! Form::close() !!}
  </section>
@endsection
