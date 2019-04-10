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
