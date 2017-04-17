@extends('layouts.base')
@section('page_styles')

@endsection

@section('content')
	<article class="content forms-page">
		<div class="title-block">
			<h3 class="title">
				@include('errors._check')
				Edição
			</h3>
			<p class="title-description"> Edição de Usuário </p>
		</div>
		<div class="subtitle-block">
			<h3 class="subtitle">
				Usuário: {{ $user->name }}
			</h3> </div>
		<section class="section">
			<div class="row sameheight-container">
				<div class="col-md-12">
					<div class="card card-block sameheight-item">
						<div class="title-block">
							<h3 class="title">
								{{ $user->name }}
							</h3>
						</div>
						{!! Form::model($user,[
                            'route'=>["$module_name.update", $user->id],
                            'method' => 'put',
                            'files' => true
                            ])
                        !!}
						@include('admin.users._form')
						<div class="row">
							{!! Form::submit('Salvar', ['class'=>'btn btn-info pull-right publish']) !!}
						</div>


						{!! Form::close() !!}

					</div>
				</div>
			</div>
		</section>



	</article>

@endsection

@section('page_scripts')
	<!-- Load JS here for greater good =============================-->


@endsection