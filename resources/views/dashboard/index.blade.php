<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

     <!-- Set the viewport width to device width for mobile -->
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title></title>
     <!-- Included CSS Files, use foundation.css if you do not want minified code -->
     <link rel="stylesheet" href="css/foundation.min.css">
     <link rel="stylesheet" href="css/foundation.css">
     <link rel="stylesheet" href="css/app.css">
     <!-- Custom Modernizr for Foundation -->
  </head>
  <body>

    @include('includes.header')

    <h1>My Questionnaires</h1>
    <a href="/questionnaire/create">Create Questionnaire</a>
    <section>
      @if (isset($questionnaires))     {{--Check that all the data is being passed over--}}

      <ul>
        @foreach ($questionnaires as $questionnaires)         {{--If the data is being passed over show all the questionnaire titles--}}
          <a href="questionnaire/{{ $questionnaires->id }}/edit">{{$questionnaires->title}}</a>
          <p>Created At: {{$questionnaires->created_at}}</p>
          <p>Last Updated At: {{$questionnaires->updated_at}}</p>
          <a href="/responses/show">Responses</a>
          <a href="/questionnaire">Edit</a>
          <!--Cannot anchor the delete button unlike update for security-->
          {!! Form::open(['method' => 'DELETE', 'route' => ['questionnaire.destroy', $questionnaires->id]]) !!}
          {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
          {!! Form::close() !!}
          <a href="questionnaire/show">Take</a>
        </ul>
          @endforeach
        @else {{--If no data is being passed over or no questionnaires have been made this show--}}
        <p>No questionnaires made</p>
        @endif
      </section>

      @include('includes.footer')


<!-- Latest version of jQuery -->
<script src="js/vendor/jquery.js"></script>
<!-- Included JS Files (Minified) -->
<script src="js/vendor/foundation.min.js"></script>
<!-- Initialize JS Plugins -->
<script src="js/app.js"></script>

  </body>
</html>
