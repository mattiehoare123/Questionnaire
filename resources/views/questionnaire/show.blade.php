@extends('layouts.master')

@section('title', 'Take Questionnaire')

@section('content')
  <section>
    <h1>{{ $questionnaires->title }}</h1>
    <p>{{ $questionnaires->description  }}</h1>
    <p>{{ $questionnaires->ethical }}</p>

    <section>

        @if (isset($question))     {{--Check that all the data is being passed over--}}

        <ul>
          @foreach ($question as $question)         {{--If the data is being passed over show all the questionnaire titles--}}
            <p>{{$question->question}}</p>
            <a href="{{ url('question/'. $question->id)}}" class="hollow button warning">Answer</a>
            @endforeach
          </ul>
          @else {{--If no data is being passed over or no questionnaires have been made this show--}}
          <p>No questionnaires made</p>
          @endif
        </section>
    @endsection
