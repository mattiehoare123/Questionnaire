<div class="columns small-12 large-12">
    {!! Form::label('question', 'Question:') !!}<!--Label for the question field input-->
    {!! Form::text('question', null) !!}<!--Form input for the question field-->
</div>
<div class="columns small-12 large-12">
    {!! Form::label('required', 'Required:') !!}
    <!--If the yes button is checked it will send the value true into the DB for the required question-->
    {!! Form::radio('required', true) !!}Yes
    {!! Form::radio('required', false) !!}No
</div>
