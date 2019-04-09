@extends('layouts.master')

@section('title', 'Edit Questionnaire')

@section('content')
    <section>

      <h1>Edit - {{$questionnaires->title}}</h1>
      <a id="title" href="{{ url('questionnaire/'.$questionnaires->id.'/edit')}}" class="hollow button warning">Edit Title</a>
      <a href="/question/{{$questionnaires->id}}/create" class="hollow button success">Create Quesion</a>

      @if (isset($question))     {{--Check that all the data is being passed over--}}

      <table>
        <thead>
          <tr>
            <td>Question</td>
            <td>Choices</td>
            <td>Edit</td>
            <td>Delete</td>
          </tr>
        </thead>
        <tbody>

        @foreach ($question as $question)         {{--If the data is being passed over show all the questionnaire titles--}}
        <tr>
            <td>{{$question->question}}</td>
            <td>{{$question->choice}}</td>
            <!--When using question/{{$question->id}}/edit it produced a url which was questionnaire/5/question/1/edit which is incorrect
            and it did not route to the edit page so within laravel it has a helper called url which generates the path given which got rid of
            the questionnaire/5 at the beginning of the url so therefore this now routes to the correct file-->
            <td><a href="{{ url('question/'.$question->id.'/edit')}}" class="hollow button warning">Edit</a></td>
            <td>
              {!! Form::open(['method' => 'DELETE', 'route' => ['question.destroy', $question->id]]) !!}
              {!! Form::submit('Delete', ['class' => 'hollow alert button']) !!}
              {!! Form::close() !!}
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
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
@endsection
