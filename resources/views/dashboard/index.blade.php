@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
  <section>
    <h1>My Questionnaires</h1>
    <a id="create" href="/questionnaire/create" class="hollow button success">Create Questionnaire</a>

      @if (isset($questionnaires))     {{--Check that all the data is being passed over--}}

      <table>
        <thead>
          <tr>
            <td>Title</td>
            <td>Created At</td>
            <td>Last Updated</td>
            <td>Take</td>
            <td>Responses</td>
            <td>Edit</td>
            <td>Delete</td>
          </tr>
        </thead>
        <tbody>
          @foreach ($questionnaires as $questionnaires)         {{--If the data is being passed over show all the questionnaire titles--}}
          <tr>
            <td>{{$questionnaires->title}}</td>
            <td>{{$questionnaires->created_at}}</td>
            <td>{{$questionnaires->updated_at}}</td>
            <td><a href="questionnaire/{{$questionnaires->id}}" name="{{$questionnaires->title}}" class="hollow button success">Take</a></td>
            <td><a href="responses/{{$questionnaires->id}}" class="hollow button">Responses</a></td>
            <!--Show all questionnaire and questions that belong to that id and show all choices that belong to the question-->
            <td><a href="/questionnaire/{{$questionnaires->id}}/index" class="hollow button warning">Edit</a></td>
            <!--Cannot anchor the delete button unlike update for security-->
            <td>
              {!! Form::open(['method' => 'DELETE', 'route' => ['questionnaire.destroy', $questionnaires->id]]) !!}
              {!! Form::submit('Delete', ['class' => 'hollow alert button']) !!}
              {!! Form::close() !!}
          </td>
        </tr>
          @endforeach
      </tbody>
    </table>
      @else {{--If no data is being passed over or no questionnaires have been made this show--}}
        <p>No questionnaires created yet</p>
      @endif
  </section>
@endsection
