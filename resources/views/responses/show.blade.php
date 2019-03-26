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

          <section>

            @if (isset($response))     {{--Check that all the data is being passed over--}}

            <ul>
              @foreach ($response as $response)         {{--If the data is being passed over show all the questionnaire titles--}}
                <p>{{$response->responses}}</p>
                @endforeach
              </ul>
              @else {{--If no data is being passed over or no questionnaires have been made this show--}}
              <p>No responses made</p>
              @endif
            </section>


  </body>
</html>
