@extends('layouts.master')<!--Telling the view it's a child of the master layout by using extends-->

@section('title', 'Take Questionnaire')<!--Linking the title to the title yeild in the master template linking it with the name and giving it a parameter -->
@section('content')<!--This calls the yeild and everything between the section will be inserted into the position of yeild-->
  <section style="overflow-x:hidden">
    <h1>{{ $questionnaires->title }}</h1> <!--Get the questionnaire title from the variable-->
    <p>{{ $questionnaires->description  }}</p> <!--Get the questionnaire description from the varaible-->
    <h3>Ethical Statement</h3>
    <p>{{ $questionnaires->ethical }}</p> <!--Get the questionnaire ethical statement from the varaible-->
    <a href="#down"><button class="button success">Agree</button></a>
    <a href="{{ url('/dashboard')}}"><button class="button alert">Disagree</button></a>
  </section>

  <section id="down">
    <p style="color: red">*Required</p>
    @include ('errors/errorlist')<!--Include the error code if any errors occur-->
    <!--Creates a form which will send to the Response store method-->
    @if (isset($question))   <!--Check the data is being passed over-->
      <!--When putting the for loop in the form when submitting the form the question_id of the last question would store not the question was answered so therefore took the loop of the form and
          now each question has a form which will send the correct question_id-->
      @foreach ($question as $question)   <!--Loop through the questions-->

    {!! Form::open(array('action' => 'ResponseController@store', 'id' => 'submitQuestionnaire')) !!}
    @csrf

        {!! Form::hidden('question_id', $question->id ) !!} <!--Getting the question->id and storing it as hidden-->

        <!--If the question is required place a red star indicating that if it is-->
        @if($question->required == 1)
            <p>{{$i++}}. {{$question->question}} <span style="color: red;">*</span> </p>  <!--Display the questions-->
          @else
            <p>{{$i++}}. {{$question->question}}</p>  <!--Display the questions-->
          @endif
          @foreach($question->choice as $choices) <!--Loop over the responses-->
              {!! Form::hidden('choice_id', $choices->id ) !!}
               <!--Getting the choice->id and storing it as hidden-->
              <!--Each choice was next to one another so therefore wrapped it in a p tag which puts each choice on a new line-->
              <p>{!! Form::radio('responses', $choices->choice) !!}{{$choices->choice}}</p> <!--Display the choices with radio button next besides them for user to select-->
            @endforeach

            {!! Form::submit('Submit', ['class' => 'button']) !!} <!--Submit after answering each question-->


        {!! Form::close() !!}
            @endforeach

        <div class="columns small-6 large-6"><a id="finish" ref="{{ url('/dashboard')}}" class="hollow button success">Finish</a></div>

        @else  <!--If there is no data being passed over or no questions have been created yet-->
          <p>No Questions Created Yet</p>
        @endif
    </section>
  @endsection
