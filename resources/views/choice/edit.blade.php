@extends('layouts.master')<!--Telling the view it's a child of the master layout by using extends-->

@section('title', 'Edit Choice')<!--Linking the title to the title yeild in the master template linking it with the name and giving it a parameter -->

@section('content')<!--This calls the yeild and everything between the section will be inserted into the position of yeild-->
  <h1 class="heading">Edit Choice - {{$choice->choice}}</h1><!--Display the choice title that is being edited-->
  @include ('errors/errorlist')<!--Include the error code if any occur-->
  <!--Find and load the choice->id data into the form-->
  {!! Form::model($choice, ['url' => 'choice/'. $choice->id]) !!}
  <!-- Laravel did not support PATCH when placed above so therefore used a method called form spoof which hids the method to spoof the HTTP which worked below-->
        @method('PATCH')
        @csrf
        @include('partials/choiceform')<!--Include the choice form-->
        <div class="columns small-8 large-6">
          {!! Form::submit('Update', ['class' => 'button']) !!}<!--Send to form to the update method when clicked upon-->
        </div>
    {!! Form::close() !!}
@endsection
