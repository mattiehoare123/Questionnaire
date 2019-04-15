@extends('layouts.master') <!--Telling the view it's a child of the master layout by using extends-->

@section('title', 'Dashboard') <!--Linking the title to the title yeild in the master template linking it with the name and giving it a parameter -->

@section('content') <!--This calls the yeild and everything between the section will be inserted into the position of yeild-->
<section>
  <h1>{{$questionnaires->title}}</h1> <!--Get the questionnaire title-->

      @if (isset($question)) <!--Check that all the the data is being passed over-->

<table id="responses">
    <tr>
      <th>Number</th>
      <th>Question</th><!--The table header for the question-->
      <th>Response</th><!--The table header for the response-->
    </tr>
    <tr>
      @foreach ($question as $question)
      <td>{{$number++}}</td>   <!--Loop through the questions array and show each question-->
      <td>
        {{$question->question}} <!--Display each question-->
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
