@if (isset($errors) && count($errors) > 0)
     <small class="text-danger">{{ $errors->first($input) }}</small>
@endif