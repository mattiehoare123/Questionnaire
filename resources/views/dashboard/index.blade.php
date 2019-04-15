@extends('layouts.master')<!--Telling the view it's a child of the master layout by using extends-->

@section('title', 'Dashboard')<!--Linking the title to the title yeild in the master template linking it with the name and giving it a parameter -->

@section('content')<!--This calls the yeild and everything between the section will be inserted into the position of yeild-->
  <section>
    @if (session('Questionnaire_Delete'))<!--If the session has a message which has been passed with the view then display it-->
    <div class="callout alert" data-closable>
      {{session('Questionnaire_Delete')}}<!--Display the message-->
      <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    @endif

    <div class="row">
      <div class="columns small-8 large-8"><h1>My Questionnaires</h1></div>
      <div class="columns small-4 large-4"><a id="create" href="/questionnaire/create" class="hollow button success">Create Questionnaire</a></div>
    </div>


    <!--To create a new questionnaire take the user to the create questionnaire view not id need passing as there are none required in the form-->

      @if (isset($questionnaires))  <!--Check tha data is being passed over-->
      <div class="row">
        <div class="columns">
          <div class="table-scroll">
      <table id="dashboard">
        <thead>
          <tr>
            <td>Title</td>  <!--Table Headers-->
            <td>Created At</td>
            <td>Last Updated</td>
            <td>Edit</td>
            <td>Take</td>
            <td>Responses</td>
            <td>Delete</td>
          </tr>
        </thead>
        <tbody>
          @foreach ($questionnaires as $questionnaires) <!--Loop through the questionnaires array and display the questionnaires-->
          <tr>
            <td>{{$questionnaires->title}}</td><!--Display the questionnaire title-->
            <td>{{$questionnaires->created_at}}</td><!--Display the questionnaire created at time-->
            <td>{{$questionnaires->updated_at}}</td><!--Display the questionnaire last updated time at-->
            <!--Take the user to the questionnaire index to display the title, question and choice for editing or deleting-->
            <td><a href="/questionnaire/{{$questionnaires->id}}/index" class="clear button warning">Edit</a></td>
            <!--Take the user to the questionnaire show view to take the questionnaire passing the $id-->
            <td><a href="questionnaire/{{$questionnaires->id}}" name="{{$questionnaires->title}}" class="clear button success">Take</a></td>
            <!--Take the user to the response show view passing the $id-->
            <td><a href="responses/{{$questionnaires->id}}" class="clear button">Responses</a></td>

            <!--Cannot anchor the delete button unlike update for security therefore create a form for deletion-->
            <td>
              {!! Form::open(['method' => 'DELETE', 'route' => ['questionnaire.destroy', $questionnaires->id]]) !!}
              {!! Form::submit('Delete', ['class' => 'clear alert button']) !!}
              {!! Form::close() !!}
          </td>
        </tr>
          @endforeach
      </tbody>
    </table>
  </div>
</div>
</div>
      @else <!--If no questionnaires have been passed over display this message-->
        <p>No Questionnaires Created Yet</p>
      @endif
  </section>
@endsection
