@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
<section>
  <h1>{{$questionnaires->title}}</h1>

      @if (isset($question))     {{--Check that all the data is being passed over--}}

      <table>
        <thead>
          <tr>
            <td>Question</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            @foreach ($question as $question)         {{--If the data is being passed over show all the questionnaire titles--}}
            <td>{{$question->question}}</td>
            @foreach($question->response as $responses)
            <ul>
              <li>{{$responses->responses}}</td>
            @endforeach
          </tr>
          @endforeach
        </tbody>
      </table>
      @else {{--If no data is being passed over or no questionnaires have been made this show--}}
      <p>No Responses On This Question Yet</p>
      @endif
  </section>
  @endsection
