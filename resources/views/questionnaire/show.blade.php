<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <section>
      @if (isset($questionnaires))     {{--Check that all the data is being passed over--}}

      <ul>
        @foreach ($questionnaires as $questionnaires)         {{--If the data is being passed over show all the questionnaire titles--}}
          <a href="questionnaire/{{ $questionnaires->id }}/edit">{{$questionnaires->title}}</a>
        </ul>
        @endforeach
        @else {{--If no data is being passed over or no questionnaires have been made this show--}}
        <p>No questionnaires made</p>
        @endif
      </section>
      <section>

        @if (isset($question))     {{--Check that all the data is being passed over--}}

        <ul>
          @foreach ($question as $question)         {{--If the data is being passed over show all the questionnaire titles--}}
            <a href="question/{{ $question->id }}/edit">{{$question->question}}</a>
            @endforeach
          </ul>
          @else {{--If no data is being passed over or no questionnaires have been made this show--}}
          <p>No questionnaires made</p>
          @endif
        </section>
        {!! Form::open(array('action' => 'ResponseController@store', 'id' => 'submitQuestionnaire')) !!}
        {{ csrf_token() }}
        <section>

          @if (isset($choice))     {{--Check that all the data is being passed over--}}

          <ul>
            @foreach ($choice as $choice)         {{--If the data is being passed over show all the questionnaire titles--}}
            <div class="wrapper-class">
              <!--This passes in the choice into the responses model-->
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
  </body>
</html>
