@extends('layouts.master')

@section('title', 'Take Questionnaire')

@section('content')
    <section>

        <h1>{{$question->question}}</h1>

        {{$question->questionnaires->id}}

        {!! Form::open(array('action' => 'ResponseController@store', 'id' => 'submitQuestionnaire')) !!}
        @csrf
        {!! Form::hidden('question_id', $question->id ) !!}


        <section>

          @if (isset($choice))     {{--Check that all the data is being passed over--}}

          <ul>
            @foreach ($choice as $choice)         {{--If the data is being passed over show all the questionnaire titles--}}
            <div class="wrapper-class">
              <!--This passes in the choice into the responses model-->
              {!! Form::hidden('choice_id', $choice->id ) !!}
              {!! Form::radio('responses', $choice->choice) !!}{{$choice->choice}}
            </div>
              @endforeach
            </ul>
            @else {{--If no data is being passed over or no questionnaires have been made this show--}}
            <p>No choices yet</p>
            @endif
          </section>
          <div class="row large-4 columns">
              {!! Form::submit('Submit', ['class' => 'button']) !!}
          </div>
        {!! Form::close() !!}
      </section>
    @endsection
