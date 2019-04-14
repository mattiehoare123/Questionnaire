@extends('layouts.master') <!--This calls the master template to display with this page-->

@section('title', 'Dashboard') <!--This declares the title of the webpage -->

@section('content') <!--This calls the yeild which is in the master template-->
<section>
  <h1>{{$questionnaires->title}}</h1> <!--Get the questionnaire title-->

      @if (isset($question)) <!--Check that all the the data is being passed over-->

<table>
    <tr>
      <th>Question</th>
      <th>Response</th>
    </tr>
    <tr>
      @foreach ($question as $question)   <!--Loop over the questions that are in the table-->
      <td>
        {{$question->question}}
      </td>
      <td>
        @foreach($question->response as $responses) <!--Loop over the responses-->
          <ul>
            <li>{{$responses->responses}}</li> <!--Display the responses to the question-->
          </ul>
          @endforeach
      </td>
    </tr>
  @endforeach
</table>
@else <!--If there is no data being passed over or if no responses have been made yet-->
<p>No Responses On This Question Yet</p>
@endif
</section>
@endsection
