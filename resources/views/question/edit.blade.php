@extends('layouts.master')<!--Telling the view it's a child of the master layout by using extends-->

@section('title', 'Edit Question')<!--Linking the title to the title yeild in the master template linking it with the name and giving it a parameter -->

@section('content')<!--This calls the yeild and everything between the section will be inserted into the position of yeild-->
  <h1 class="heading">Edit Question - {{$question->question}}</h1><!--Get the question title that is being edited-->
  @include ('errors/errorlist')

  @if (session('Edit_Choice'))<!--If the session has a message which has been passed with the view from the controller then display it-->
  <section class="callout success" data-closable>
    {{session('Edit_Choice')}}<!--Display the message-->
    <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
      <span aria-hidden="true">&times;</span>
    </button>
  </section>
  @endif

  @if (session('Delete_Choice'))
  <section class="callout alert" data-closable>
    {{session('Delete_Choice')}}
    <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
      <span aria-hidden="true">&times;</span>
    </button>
  </section>
  @endif

  <!--Find and load the question->id data into the form-->
  {!! Form::model($question, ['url' => 'question/'. $question->id]) !!}
  @csrf
  <!-- Laravel did not support PATCH when placed above so therefore used a method called form spoof which hides the method to spoof the HTTP which worked below-->
      @method('PATCH')
      @csrf
      @include('partials/questionform')<!--Include the question form-->
      <div class="columns small-6 large-6">
        {!! Form::submit('Update', ['class' => 'button floatButton']) !!}
      </div>

      <div class="columns small-6 large-6">
        <a href="{{ url('choice/'.$question->id.'/create')}}" class="hollow button success">Add Choice</a>
      </div>
    {!! Form::close() !!}
    <!--Create a choice by sending the user to the choice create view passing over the question->id-->

      @if (isset($choice))  <!--Check that all the data is being passed over-->

      <table>
        <thead>
          <tr>
            <td>Choice</td> <!--Table headers-->
            <td>Edit</td>
            <td>Delete</td>
          </tr>
          <thead>
          <tbody>
          </tbody>

          @foreach ($choice as $choice)   <!--Loop through the choice array and show each choice that belongs to that question-->
          <tr>
            <td>{{$choice->choice}}</td> <!--Display the choice-->
            <!--Edit a choice by sending the user to the choice edit view passing over the $id to find the choices data-->
            <td><a href="{{ url('choice/'.$choice->id.'/edit')}}" class="clear button warning">Edit</a></td>
            <td>
              <!--Create a form to delete a choice-->
              {!! Form::open(['method' => 'DELETE', 'route' => ['choice.destroy', $choice->id]]) !!}
              {!! Form::submit('Delete', ['class' => 'clear button alert']) !!}
              {!! Form::close() !!}
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    @else <!--If no choices being passed over display this message-->
    <p>No Choices Created Yet</p>
    @endif
@endsection
