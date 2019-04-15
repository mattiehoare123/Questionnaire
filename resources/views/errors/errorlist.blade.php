<!--If any errors occur show this piece of code-->
@if ($errors->any())
<div class="callout alert" data-closable>
  @foreach ($errors->all() as $error)<!--Loop through the erros displaying them in a list-->
    <ul>
      <li>{{ $error }}</li>
    </ul>
  @endforeach
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close><!--Button to close the errors-->
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
