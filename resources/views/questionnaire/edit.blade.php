@extends('layouts.master')

@section('title', 'Edit Questionnaire Title')

@section('content')
  <section>
    <h1>Edit - {{$questionnaires->title}} Welcome Page</h1>
    <!--If there are any errors loop through the errors and display them to the user-->
    @include ('errors/errorlist')
    <!--Edit Form-->
    {!! Form::model($questionnaires, ['url' => 'questionnaire/'. $questionnaires->id]) !!}
    <!-- Laravel did not support PATCH when placed above so therefore used a method called form spoof which hids the method to spoof the HTTP which worked below-->
            @method('PATCH')
            @csrf
            @include('partials/questionnaireform')
        <div class="row large-4 columns">
            {!! Form::submit('Update', ['class' => 'button']) !!}
        </div>
    {!! Form::close() !!}
  </section>
  @endsection
