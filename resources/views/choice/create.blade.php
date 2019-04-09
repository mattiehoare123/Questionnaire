@extends('layouts.master')

@section('title', 'Create Choice')

@section('content')
    <div class="columns large-12">
      <h1>Add Choices</h1>
      {!! Form::open(array('action' => 'ChoiceController@store', 'id' => 'createChoice')) !!}
      @csrf
      {!! Form::hidden('question_id', $question->id) !!}
      <!--Because the form only takes the last input in the form therefore if i had two choices input it will only send the last one to the controller
      so i've put one choice with the option to add another which will redirect to this same page and after all choices are completed the button will take
      the user to the new questionnaire just created--->
              {!! Form::label('choice', 'Choice:') !!}
              {!! Form::text('choice', null) !!}
              {!! Form::submit('Add Another', ['class' => 'hollow button success']) !!}
      {!! Form::close() !!}
      <a href="{{ url('questionnaire/'.$question->questionnaires_id.'/index')}}" class="hollow button">Complete</a>
  </div>
@endsection
