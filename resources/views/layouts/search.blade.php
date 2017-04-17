{{ Form::open(['url'=>route("$module_name.search"), 'class'=>'form-inline']) }}
<div class="items-search">
	<div class="input-group">
		{{ Form::text('search',isset($search) ? $search : null,['class'=>'form-control boxed rounded-s',
		'placeholder'=>'Busca', 'id'=>'search']) }}
		<div class="autocomplete-suggestions"></div>
		<span class="input-group-btn">
			<button type='submit' class="btn btn-secondary rounded-s" type="button">
				<i class="fa fa-search"></i>
			</button>
		</span> 
	</div>
</div>
{{ Form::close() }}
