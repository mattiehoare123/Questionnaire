@extends('layouts.master')<!--Telling the view it's a child of the master layout by using extends-->

@section('title', 'Take Questionnaire')<!--Linking the title to the title yeild in the master template linking it with the name and giving it a parameter -->
@section('content')<!--This calls the yeild and everything between the section will be inserted into the position of yeild-->
  <section>
    <h1>{{ $questionnaires->title }}</h1> <!--Get the questionnaire title from the variable-->
    <p>{{ $questionnaires->description  }}</p> <!--Get the questionnaire description from the varaible-->
    <p>{{ $questionnaires->ethical }}</p> <!--Get the questionnaire ethical statement from the varaible-->
    <!--Creates a form which will send to the Response store method-->
    {!! Form::open(array('action' => 'ResponseController@store', 'id' => 'submitQuestionnaire')) !!}
    @csrf

      @if (isset($question))   <!--Check the data is being passed over-->

        @foreach ($question as $question)   <!--Loop through the questions-->
        {!! Form::hidden('question_id', $question->id ) !!} <!--Getting the question->id and storing it as hidden-->
          <p>{{$i++}}. {{$question->question}}</p>  <!--Display the questions-->

          @foreach($question->choice as $choices) <!--Loop over the responses-->
              {!! Form::hidden('choice_id', $choices->id ) !!} <!--Getting the choice->id and storing it as hidden-->
              <!--Each choice was next to one another so therefore wrapped it in a p tag which puts each choice on a new line-->
              <p>{!! Form::radio('responses', $choices->choice) !!}{{$choices->choice}}</p> <!--Display the choices with radio button next besides them for user to select-->
            @endforeach

            {!! Form::submit('Submit', ['class' => 'button']) !!} <!--Submit after answering each question-->

        @endforeach
        {!! Form::close() !!}
        @else  <!--If there is no data being passed over or no questions have been created yet-->
          <p>No Questions Created Yet</p>
        @endif
    </section>
  @endsection
