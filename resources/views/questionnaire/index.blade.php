@extends('layouts.master')

@section('title', 'Edit Questionnaire')

@section('content')
    @if (session('Question_Delete'))
    <div class="callout alert" data-closable>
      {{session('Question_Delete')}}
      <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif

    @if (session('Edit_Title'))
    <div class="callout success" data-closable>
      {{session('Edit_Title')}}
      <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif

    @if (session('Edit_Question'))
    <div class="callout success" data-closable>
      {{session('Edit_Question')}}
      <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif

    <section>
      <div class="row">
        <div class="columns small-6 large-6"><h1>Edit - {{$questionnaires->title}}</h1></div>
        <div class="columns small-3 large-4"><a id="title" href="{{ url('questionnaire/'.$questionnaires->id.'/edit')}}" class="hollow button warning">Edit Title</a></div>
        <div class="columns small-3 large-2"><a href="/question/{{$questionnaires->id}}/create" id="createQuestionButton" class="hollow button success">Create Quesion</a></div>
      </div>
      <div class="row">
        <div class="columns small-12 large-12"><h1>{{$questionnaires->description}}</h1></div>
        <div class="columns small-12 large-12"><h1>{{$questionnaires->ethical}}</h1></div>
      </div>

      @if (isset($question))     {{--Check that all the data is being passed over--}}
      <div class="row">
        <div class="columns">
          <div class="table-scroll">
      <table>  <!--Start of table-->
        <thead>
          <tr>
            <th>Number</th>
            <th>Question</th>
            <th>Choices</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
        <tr>
        @foreach ($question as $question)         {{--If the data is being passed over show all the questionnaire titles--}}
            <td>{{$number++}}
            <td>{{$question->question}}</td>
            <!--When using $question->choice is returns an array colletion of the choices and if i used $question->choice->id
            it would say instance does not exist because the relationship was has many. So i used a foreach to loop through the choices
            to get a single choice and then i could access the id, question_id and choice-->
            <td>
              @foreach($question->choice as $choices)
              <ul>
                <li>{{$choices->choice}}</li>
              </ul>
                @endforeach
            </td>
            <!--When using question/{{$question->id}}/edit it produced a url which was questionnaire/5/question/1/edit which is incorrect
            and it did not route to the edit page so within laravel it has a helper called url which generates the path given which got rid of
            the questionnaire/5 at the beginning of the url so therefore this now routes to the correct file-->
            <td><a href="{{ url('question/'.$question->id.'/edit')}}" class="clear button warning">Edit</a></td>
            <td>
              {!! Form::open(['method' => 'DELETE', 'route' => ['question.destroy', $question->id]]) !!}
              {!! Form::submit('Delete', ['class' => 'clear alert button']) !!}
              {!! Form::close() !!}
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>  <!--End of the table-->
    @else  <!--If no data is being passed through or no questions have been created yet-->
    <p>You Have Not Created Any Questions Yet</p>
    @endif
    </div>
  </div>
</div>

  </section>
@endsection
