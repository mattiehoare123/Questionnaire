@extends('layouts.master')

@section('title', 'Create Question')

@section('content')
  <section>
    <h1>Add New Question</h1>
    @if ($errors->any())
    <div class="callout alert" data-closable>
      @foreach ($errors->all() as $error)
        <ul>
          <li>{{ $error }}</li>
        </ul>
      @endforeach
      <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
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
