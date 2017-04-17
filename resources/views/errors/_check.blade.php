@if (isset($errors) && count($errors) > 0)
<script >
	swal(@foreach ($errors->all() as $error)
		"{{ $error."" }}"
		@endforeach

		,"",'error');
</script>
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
@if(session()->has('message'))
	<script>	swal("{{ session()->get('message') }}","",'success');
	</script>
@endif
