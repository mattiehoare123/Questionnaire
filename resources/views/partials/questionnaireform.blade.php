<div class="columns small-12 large-12">
    {!! Form::label('title', 'Title:') !!}<!--Label for the title field input-->
    {!! Form::text('title', null) !!}<!--Form input for the title field-->
</div>

<div class="columns small-12 large-12">
    {!! Form::label('description', 'Description:') !!}<!--Label for the description field input-->
    {!! Form::textarea('description', null) !!}<!--Form input for the description field-->
</div>

<div class="columns small-12 large-12">
    {!! Form::label('ethical', 'Ethical Statement:') !!}<!--Label for the ethical field input-->
    {!! Form::textarea('ethical', null) !!}<!--Form input for the ethical field-->
</div>
