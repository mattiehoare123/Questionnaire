<div class="columns small-12 large-12">
    {!! Form::label('question', 'Question:') !!}<!--Label for the question field input-->
    {!! Form::text('question', null) !!}<!--Form input for the question field-->
</div>
<div class="columns small-12 large-12">
    {!! Form::label('required', 'Required:') !!}
    <!--If the yes button is checked it will send the value of 1 which is equal to true and if the no button is checked it will send the value 0 which represents false into the DB for the required question-->
    {!! Form::radio('required', 1) !!}Yes
    {!! Form::radio('required', 0) !!}No
</div>
