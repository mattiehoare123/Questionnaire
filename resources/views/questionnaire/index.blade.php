<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <title></title>
  </head>
  <body>
    <section>

          <p>Edit - {{$questionnaires->title}}</p>
          <a href="{{ url('questionnaire/'.$questionnaires->id.'/edit')}}">Edit Title</a>

      </section>
      <section>
        <a href="/question">Edit Questions</a>
        @if (isset($question))     {{--Check that all the data is being passed over--}}

        <ul>
          @foreach ($question as $question)         {{--If the data is being passed over show all the questionnaire titles--}}
            <p>{{$question->question}}</p>
            <!--When using question/{{$question->id}}/edit it produced a url which was questionnaire/5/question/1/edit which is incorrect
            and it did not route to the edit page so within laravel it has a helper called url which generates the path given which got rid of
            the questionnaire/5 at the beginning of the url so therefore this now routes to the correct file-->
            <a href="{{ url('question/'.$question->id.'/edit')}}">Edit</a>

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
