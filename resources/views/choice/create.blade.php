@extends('layouts.master')

@section('title', 'Create Choice')

@section('content')
    <h1>Add Choices</h1>
    {!! Form::open(array('action' => 'ChoiceController@store', 'id' => 'createChoice')) !!}
    @csrf
    {!! Form::hidden('question_id', $question->id) !!}

    <div class="columns large-12">
            {!! Form::label('choice', 'Choice:') !!}
            {!! Form::text('choice', null) !!}
        </div>
        <div class="columns large-12">
            {!! Form::label('choice', 'Choice:') !!}
            {!! Form::text('choice', null) !!}
        </div>
        <div class="columns large-12">
            {!! Form::submit('Submit', ['class' => 'button']) !!}
        </div>
    {!! Form::close() !!}
@endsection
