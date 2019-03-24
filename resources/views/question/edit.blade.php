<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
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
    <!-- Laravel did not support PATCH when placed above so therefore used a method called form spoof which hids the method to spoof the HTTP which worked below-->
            @method('PATCH')
            @csrf
            <div class="row large-12 columns">
                {!! Form::label('question', 'Question:') !!}
                {!! Form::text('question', null, ['class' => 'large-8 columns']) !!}
            </div>
            <div class="row large-4 columns">
                {!! Form::submit('Update', ['class' => 'button']) !!}
            </div>
        {!! Form::close() !!}

        <section>

          @if (isset($choice))     {{--Check that all the data is being passed over--}}

          <ul>
            @foreach ($choice as $choice)         {{--If the data is being passed over show all the questionnaire titles--}}
              <a href="choice/{{ $choice->choice }}/edit">{{$choice->choice}}</a>
              <a href="choice/{{$choice->id}}/edit">Edit Choice</a>
              @endforeach
            </ul>
            @else {{--If no data is being passed over or no questionnaires have been made this show--}}
            <p>No choices yet</p>
            @endif
          </section>

  </body>
</html>
