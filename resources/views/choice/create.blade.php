@extends('layouts.master')<!--Telling the view it's a child of the master layout by using extends-->

@section('title', 'Create Choice')<!--Linking the title to the title yeild in the master template linking it with the name and giving it a parameter -->

@section('content')<!--This calls the yeild and everything between the section will be inserted into the position of yeild-->
  <h1 class="heading">Add Choices</h1>
  @include ('errors/errorlist')<!--Include the error code if any occur-->
  <p id="choiceInfo">Enter a choice and then <span style="color:#2ba6cb; font-weight:bold;">Submit</span> it. Once all choices have beensubmitted click  <span style="color:#a3cb82; font-weight:bold;">Complete</span></p>
  <!--Create a form which will send to the choice store method-->
  {!! Form::open(array('action' => 'ChoiceController@store', 'id' => 'createChoice')) !!}
  @csrf
  {!! Form::hidden('question_id', $question->id) !!}
  <!--Because the form only takes the last input in the form therefore if i had two choices input it will only send the last one to the controller
  so i've put one choice with the option to add another which will redirect to this same page and after all choices are completed the button will take
  the user to the new questionnaire just created--->
  @include('partials/choiceform')
  <div class="columns small-6 large-6">
      {!! Form::submit('Submit', ['class' => 'button floatButton']) !!}
  </div>
  <div class="columns small-6 large-6">
    <a href="{{ url('questionnaire/'.$question->questionnaires_id.'/index')}}" class="hollow button success">Complete</a>
  </div>
  {!! Form::close() !!}
  <!--After the user added all choices take them back to the question edit form-->
@endsection
