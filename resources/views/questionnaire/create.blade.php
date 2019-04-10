@extends('layouts.master')

@section('title', 'Create Questionnaire')

@section('content')
    <section>
    <h1>New Questionnaire</h1>
    @include ('errors/errorlist')
    {!! Form::open(array('action' => 'QuestionnaireController@store', 'id' => 'createTitle')) !!}
    @csrf
    <!--This is a hidden field which is required in the questionnaire table which is a foregin key of user_id so therefore
    to pass to the user id i have used Auth::user()->id which gets the current users id logged in and passes it to the controller store method then model--->
    {!! Form::hidden('user_id', Auth::user()->id ) !!}
    @include('partials/questionnaireform')
        <div>
            {!! Form::submit('Submit', ['class' => 'button']) !!}
        </div>
    {!! Form::close() !!}
  </section>
@endsection
