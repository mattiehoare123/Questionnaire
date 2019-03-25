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
          <p>Created At: {{$questionnaires->created_at}}</p>
          <p>Last Updated At: {{$questionnaires->updated_at}}</p>
          <a href="/questionnaire">Edit</a>
          <!--Cannot anchor the delete button unlike update for security-->
          {!! Form::open(['method' => 'DELETE', 'route' => ['questionnaire.destroy', $questionnaires->id]]) !!}
          {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
          {!! Form::close() !!}
        </ul>
          @endforeach
        @else {{--If no data is being passed over or no questionnaires have been made this show--}}
        <p>No questionnaires made</p>
        @endif
      </section>
  </body>
</html>
