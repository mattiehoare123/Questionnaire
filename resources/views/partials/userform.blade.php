<div class="columns large-12">
        {!! Form::label('name', 'Name:') !!}<!--Label for the name field input-->
        {!! Form::text('name', null) !!}<!--Form input for the title field-->
    </div>
    <div class="columns large-12">
        {!! Form::label('email', 'Email:') !!}<!--Label for the email field input-->
        {!! Form::text('email', null) !!}<!--Form input for the email field-->
    </div>
    <div class="columns large-12">
        {!! Form::label('password', 'Password:') !!}<!--Label for the password field input-->
        {!! Form::text('password', null) !!}<!--Form input for the password field-->
    </div>
    <div class="columns large-12">
      {!! Form::label('roles', 'Roles:') !!}
      <!--Loop through the roles and display all the roles made-->
      @foreach($roles as $role)
          {{ Form::label($role->name) }}
          <!--Checkbox to select what role the user has-->
          {{ Form::checkbox('role[]', $role->id, $user->roles->contains($role->id), ['id' => $role->id]) }}
      @endforeach
  </div>
