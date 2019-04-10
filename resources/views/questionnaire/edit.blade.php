@extends('layouts.master')

@section('title', 'Edit Questionnaire Title')

@section('content')
  <section>
    <h1>Edit - {{$questionnaires->title}} Welcome Page</h1>
    <!--If there are any errors loop through the errors and display them to the user-->
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

    <!--Edit Form-->
    {!! Form::model($questionnaires, ['url' => 'questionnaire/'. $questionnaires->id]) !!}
    <!-- Laravel did not support PATCH when placed above so therefore used a method called form spoof which hids the method to spoof the HTTP which worked below-->
            @method('PATCH')
            @csrf
        <div class="row large-12 columns">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null) !!}
        </div>

        <div class="row large-12 columns">
            {!! Form::label('description', 'Description:') !!}
            {!! Form::text('description', null) !!}
        </div>

        <div class="row large-12 columns">
            {!! Form::label('ethical', 'Ethical Statement:') !!}
            {!! Form::text('ethical', null) !!}
        </div>

        <div class="row large-4 columns">
            {!! Form::submit('Update', ['class' => 'button']) !!}
        </div>
    {!! Form::close() !!}
  </section>
  @endsection
