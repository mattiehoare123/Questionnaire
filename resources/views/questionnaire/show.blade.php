@extends('layouts.master')<!--This calls the master template to display with this page-->

@section('title', 'Take Questionnaire') <!--This declares the title of the webpage -->

@section('content')<!--This calls the yeild which is in the master template-->
  <section>
    <h1>{{ $questionnaires->title }}</h1> <!--Get the questionnaire title-->
    <p>{{ $questionnaires->description  }}</p> <!--Get the questionnaire description-->
    <p>{{ $questionnaires->ethical }}</p> <!--Get the questionnaire ethical statement-->

    {!! Form::open(array('action' => 'ResponseController@store', 'id' => 'submitQuestionnaire')) !!}
    @csrf

      @if (isset($question))   <!--Check the data is being passed over-->

        @foreach ($question as $question)   <!--Loop through the questions-->
        {!! Form::hidden('question_id', $question->id ) !!}
          <p>{{$question->question}}</p>  <!--Display the questions-->

          @foreach($question->choice as $choices) <!--Loop over the responses-->
              {!! Form::hidden('choice_id', $choices->id ) !!}
              {!! Form::radio('responses', $choices->choice) !!}{{$choices->choice}}
            @endforeach <!--Take them to question show view too answer a single question-->

          <div class="row large-4 columns">
              {!! Form::submit('Submit', ['class' => 'button']) !!}
          </div>
        @endforeach
        {!! Form::close() !!}
        @else  <!--If there is no data being passed over or no questions have been created yet-->
          <p>No Questions Created Yet</p>
        @endif
    </section>
  @endsection
