@extends('layouts.master')

@section('title', 'Create Question')

@section('content')
  <section>
    <h1>Add New Question</h1>
    @include ('errors/errorlist')
    {!! Form::open(array('action' => 'QuestionController@store', 'id' => 'createQuestion')) !!}
    @csrf
    {!! Form::hidden('questionnaires_id', $questionnaires->id) !!}
    @include('partials/questionform')
        <div class="columns large-12">
            {!! Form::submit('Submit', ['class' => 'button']) !!}
        </div>
    {!! Form::close() !!}
  </section>
@endsection
