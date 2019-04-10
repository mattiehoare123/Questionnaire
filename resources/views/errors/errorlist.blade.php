@if ($errors->any())
<div class="callout alert" data-closable>
  @foreach ($errors->all() as $error)
    <ul>
      <li>{{ $error }}</li>
    </ul>
  @endforeach
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
