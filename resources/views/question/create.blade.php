@extends('layouts.master')

@section('title', 'Create Question')

@section('content')

    @if ($errors->any())
        <div>
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section>
    <h1>Add New Question</h1>
    {!! Form::open(array('action' => 'QuestionController@store', 'id' => 'createQuestion')) !!}
    @csrf
    {!! Form::hidden('questionnaires_id', $questionnaires->id) !!}
    <div class="columns large-12">
        {!! Form::label('question', 'Question:') !!}
        {!! Form::text('question', null) !!}
        </div>
        <div class="columns large-12">
          {!! Form::label('required', 'Required:') !!}
          <!--If the yes button is checked it will send the value true into the DB for the required question-->
          {!! Form::radio('required', true) !!}Yes
          {!! Form::radio('required', false) !!}No
        </div>
        <div class="columns large-12">
            {!! Form::submit('Submit', ['class' => 'button']) !!}
        </div>
    {!! Form::close() !!}
  </section>
@endsection
