<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <a href="question/create">Add New Question</a>
    <section>

      @if (isset($question))     {{--Check that all the data is being passed over--}}

      <ul>
        @foreach ($question as $question)         {{--If the data is being passed over show all the questionnaire titles--}}
          <a href="questionnaire/{{ $question->id }}/edit">{{$question->question}}</a>
          <a href="/questionnaire/show">Edit</a>
          @endforeach
        </ul>
        @else {{--If no data is being passed over or no questionnaires have been made this show--}}
        <p>No questionnaires made</p>
        @endif
      </section>
  </body>
</html>
