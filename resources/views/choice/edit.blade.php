@extends('layouts.master')

@section('title', 'Edit Choice')

@section('content')
    <h1>Edit Choice - {{$choice->choice}}</h1>
    @if ($errors->any())
        <div>
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::model($choice, ['url' => 'choice/'. $choice->id]) !!}
    <!-- Laravel did not support PATCH when placed above so therefore used a method called form spoof which hids the method to spoof the HTTP which worked below-->
          @method('PATCH')
          @csrf
          <div class="columns large-12">
              {!! Form::label('choice', 'Choice:') !!}
              {!! Form::text('choice', null) !!}
          </div>
          <div class="columns large-12">
              {!! Form::text('choice', null) !!}
          </div>
          <div class="columns large-12">
              {!! Form::submit('Update', ['class' => 'button']) !!}
          </div>
      {!! Form::close() !!}
@endsection
