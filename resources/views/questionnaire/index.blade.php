@extends('layouts.master')<!--Telling the view it's a child of the master layout by using extends-->

@section('title', 'Edit Questionnaire')<!--Linking the title to the title yeild in the master template linking it with the name and giving it a parameter -->

@section('content')<!--This calls the yeild and everything between the section will be inserted into the position of yeild-->

  @if (session('Question_Delete'))<!--If the sessions has a message which has been passed with the view then display is-->
  <section class="callout alert" data-closable><!--The alert class will display a red text box-->
    {{session('Question_Delete')}}<!--Dsiplay the message--->
    <button class="close-button" aria-label="Dismiss alert" type="button" data-close><!--This allows the user to close the message by clicking the exit button--->
      <span aria-hidden="true">&times;</span>
  </section>
  @endif

  @if (session('Edit_Title'))
  <section class="callout success" data-closable> <!--The success class will display a green text box-->
    {{session('Edit_Title')}}
    <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
      <span aria-hidden="true">&times;</span>
    </button>
  </section>
  @endif

  @if (session('Edit_Question'))
  <section class="callout success" data-closable>
    {{session('Edit_Question')}}
    <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
      <span aria-hidden="true">&times;</span>
    </button>
  </section>
  @endif

<section>
  <article class="row">
    <h1 class="columns small-5 large-6">Edit - {{$questionnaires->title}}</h1><!--Gets the questionnaire title from the varaible-->
    <div class="columns small-3 large-4"><a id="title" href="{{ url('questionnaire/'.$questionnaires->id.'/edit')}}" class="hollow button warning">Edit Title</a></div><!--Take the user edit questionnaire title page-->
    <div class="columns small-3 large-2"><a href="/question/{{$questionnaires->id}}/create" id="createQuestionButton" class="hollow button success">Create Question</a></div> <!--Create a question passing over the questionnaires->id-->
  </article>

  <article class="row">
    <p class="columns small-12 large-12">{{$questionnaires->description}}</p>
    <p class="columns small-12 large-12">{{$questionnaires->ethical}}</p>
  </article>
</section>

<section>
@if (isset($question))     {{--Check that all the data is being passed over--}}   <!--The isset function checks whether a variable is set or not-->
<div class="row">
  <div class="columns">
    <div class="table-scroll"><!--Make the table scrollabe on mobile devices-->
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
        @foreach ($question as $question)    <!--Loop through the question array and show each display-->
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
