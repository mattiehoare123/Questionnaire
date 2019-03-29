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
          <p>{{$questionnaires->title}}</p>
          <a href="questionnaire/{{ $questionnaires->id }}/edit">Edit Title</a>
        </ul>
        @endforeach
        @else {{--If no data is being passed over or no questionnaires have been made this show--}}
        <p>T</p>
        @endif
      </section>
      <section>

        @if (isset($question))     {{--Check that all the data is being passed over--}}

        <ul>
          @foreach ($question as $question)         {{--If the data is being passed over show all the questionnaire titles--}}
            <p>{{$question->question}}</p>
            <a href="question/{{ $question->id }}/edit">Edit</a>
            {!! Form::open(['method' => 'DELETE', 'route' => ['question.destroy', $question->id]]) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
            @endforeach
          </ul>
          @else {{--If no data is being passed over or no questionnaires have been made this show--}}
          <p>You Have Not Created Any Questions Yet</p>
          @endif
        </section>
        <section>

          @if (isset($choice))     {{--Check that all the data is being passed over--}}

          <ul>
            @foreach ($choice as $choice)         {{--If the data is being passed over show all the questionnaire titles--}}
              <p>{{$choice->choice}}</p>
              @endforeach
            </ul>
            @else {{--If no data is being passed over or no questionnaires have been made this show--}}
            <p>You Have Not Added No Chocies To The Question Yet</p>
            @endif
          </section>
</html>
