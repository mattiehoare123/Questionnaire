@extends('layouts.master')<!--Telling the view it's a child of the master layout by using extends-->

@section('title', 'Create Question')<!--Linking the title to the title yeild in the master template linking it with the name and giving it a parameter -->

@section('content')<!--This calls the yeild and everything between the section will be inserted into the position of yeild-->
  <h1 class="heading">Add New Question</h1>
  @include ('errors/errorlist')<!--Include the error code if any errors occur-->
  {!! Form::open(array('action' => 'QuestionController@store', 'id' => 'createQuestion')) !!}
  @csrf
  <!--Hidden question->id to store the question_id-->
  {!! Form::hidden('questionnaires_id', $questionnaires->id) !!}
  @include('partials/questionform') <!--Include the question form-->
  <div class="columns small-8 large-6">
    {!! Form::submit('Submit', ['class' => 'button']) !!}<!--Send the input to the controller when this button is clicked-->
    {!! Form::close() !!}
  </div>
@endsection
