@extends('layouts.master')<!--Telling the view it's a child of the master layout by using extends-->

@section('title', 'Edit Questionnaire Title')<!--Linking the title to the title yeild in the master template linking it with the name and giving it a parameter -->

@section('content')<!--This calls the yeild and everything between the section will be inserted into the position of yeild-->
  <h1 class="heading">Edit Title - {{$questionnaires->title}}</h1> <!--Display the questionnaire title that is being edited-->
  @include ('errors/errorlist')<!--Include the error code if any occur-->
  <!--Form model binding is done by changing Form::open to the tag Form::model then adding the questionnaire object,
      an id is passed into the model by $id in the edit method in the controller and then record is loaded into
      the form for editing-->
  {!! Form::model($questionnaires, ['url' => 'questionnaire/'. $questionnaires->id]) !!}
<!-- Laravel did not support PATCH when placed above so therefore used a method called form spoof which hids the method to spoof the HTTP which worked below-->
    @method('PATCH')
    @csrf
    @include('partials/questionnaireform')<!--Include the questionnaire form-->
    <div class="columns small-8 large-6">
      {!! Form::submit('Update', ['class' => 'button']) !!}<!--When clicked send the form to the update method in the controller-->
    </div>
  {!! Form::close() !!}
@endsection
