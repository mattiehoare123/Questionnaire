@extends('layouts.master')

@section('title', 'Edit Question')

@section('content')

    <h1>Edit Question - {{$question->question}}</h1>
    @if ($errors->any())
        <div>
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!--Edit Form-->
    {!! Form::model($question, ['url' => 'question/'. $question->id]) !!}
    @csrf
    <!-- Laravel did not support PATCH when placed above so therefore used a method called form spoof which hids the method to spoof the HTTP which worked below-->
        @method('PATCH')
        @csrf
        <div class="columns large-12">
            {!! Form::label('question', 'Question:') !!}
            {!! Form::text('question', null) !!}
        </div>
        <div class="columns large-12">
          {!! Form::label('required', 'Required:') !!}
          <!--If the yes button is checked it will send the value true into the DB for the required question-->
          {!! Form::radio('required', true) !!}Yes
          {!! Form::radio('required', false) !!}No
        </div>
        <div class="columns large-12">
            {!! Form::submit('Update', ['class' => 'button']) !!}
        </div>
      {!! Form::close() !!}

      <a href="{{ url('choice/'.$question->id.'/create')}}" class="hollow button success">Add Choice</a>

      <section>

        @if (isset($choice))     {{--Check that all the data is being passed over--}}

        <table>
          <thead>
            <tr>
              <td>Choice</td>
              <td>Edit</td>
              <td>Delete</td>
            </tr>
            <thead>
            <tbody>
            </tbody>

            @foreach ($choice as $choice)         {{--If the data is being passed over show all the questionnaire titles--}}
            <tr>
              <td>{{$choice->choice}}</td>
              <td><a href="{{ url('choice/'.$choice->id.'/edit')}}" class="hollow button warning">Edit Choice</a></td>
              <td>
                {!! Form::open(['method' => 'DELETE', 'route' => ['choice.destroy', $choice->id]]) !!}
                {!! Form::submit('Delete', ['class' => 'hollow button alert']) !!}
                {!! Form::close() !!}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      @else {{--If no data is being passed over or no questionnaires have been made this show--}}
      <p>No choices yet</p>
      @endif
    </section>

@endsection
