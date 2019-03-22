<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>My Questionnaires</h1>
    <a href="/questionnaire/create">Create Questionnaire</a>
    <section>
    <h1>My Questionnaires</h1>
      @if (isset($questionnaires))     {{--Check that all the data is being passed over--}}

      <ul>
        @foreach ($questionnaires as $questionnaires)         {{--If the data is being passed over show all the questionnaire titles--}}
          <a href="questionnaire/{{ $questionnaires->id }}/edit">{{$questionnaires->title}}</a>
          <a href="/questionnaire/show">Edit</a>
          @endforeach
        </ul>
        @else {{--If no data is being passed over or no questionnaires have been made this show--}}
        <p>No questionnaires made</p>
        @endif
      </section>
  </body>
</html>
