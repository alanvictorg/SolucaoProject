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
			<p class="title-description"> Edição de Empresa </p>
		</div>
		<div class="subtitle-block">
			<h3 class="subtitle">
				Usuário: {{ $company->name }}
			</h3> </div>
		<section class="section">
			<div class="row sameheight-container">
				<div class="col-md-12">
					<div class="card card-block sameheight-item">
						<div class="title-block">
							<h3 class="title">
								{{ $company->name }}
							</h3>
						</div>
						{!! Form::model($company,[
                            'route'=>["$module_name.update", $company->id],
                            'method' => 'put',
                            'files' => true
                            ])
                        !!}
						@include("admin.$module_name._form")
						<div class="row">
							<div class="pull-left"><a href="{!! route("$module_name.index") !!}" class="btn btn-warning pull-right publish"> <i class="fa fa-angle-double-left"></i> Voltar</a></div>
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