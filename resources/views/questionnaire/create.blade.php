@extends('layouts.master')

@section('title', 'Create Questionnaire')

@section('content')
    <section>
    <h1>New Questionnaire</h1>
    @if ($errors->any())
    <div class="callout alert" data-closable>
      @foreach ($errors->all() as $error)
        {{ $error }}
      @endforeach
      <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif
    {!! Form::open(array('action' => 'QuestionnaireController@store', 'id' => 'createTitle')) !!}
    @csrf
    <!--This is a hidden field which is required in the questionnaire table which is a foregin key of user_id so therefore
    to pass to the user id i have used Auth::user()->id which gets the current users id logged in and passes it to the controller store method then model--->
    {!! Form::hidden('user_id', Auth::user()->id ) !!}
        <div>
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null) !!}
        </div>

        <div>
            {!! Form::label('description', 'Description:') !!}
            {!! Form::text('description', null) !!}
        </div>

        <div>
            {!! Form::label('ethical', 'Ethical Statement:') !!}
            {!! Form::text('ethical', null) !!}
        </div>
        <div>
            {!! Form::submit('Submit', ['class' => 'button']) !!}
        </div>
    {!! Form::close() !!}
  </section>
@endsection
