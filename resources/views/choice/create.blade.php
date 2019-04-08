@extends('layouts.master')

@section('title', 'Create Choice')

@section('content')
    <h1>Add Choices</h1>
    {!! Form::open(array('action' => 'ChoiceController@store', 'id' => 'createChoice')) !!}
    @csrf
    {!! Form::hidden('question_id', $question->id) !!}

        <div class="row large-12 columns">
            {!! Form::label('choice', 'Choice:') !!}
            {!! Form::text('choice', null, ['class' => 'large-8 columns']) !!}
        </div>
        <div class="row large-12 columns">
            {!! Form::label('choice', 'Choice:') !!}
            {!! Form::text('choice', null, ['class' => 'large-8 columns']) !!}
        </div>
        <div class="row large-4 columns">
            {!! Form::submit('Submit', ['class' => 'button']) !!}
        </div>
    {!! Form::close() !!}
@endsection
