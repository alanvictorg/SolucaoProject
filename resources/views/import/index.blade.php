@extends('layouts.base')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Importação de dados do Project
                <small>Importar Dados</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home.index') }}"><i class="fa fa-dashboard"></i> Inicial</a></li>
                <li class="active">Importar</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header"> Importação de XML - Project</div>
                        <div class="box-body">
                            @if ( session()->has('message') )
                                <div class="alert alert-success alert-dismissable">{{ session()->get('message') }}</div>
                            @endif
                                {!! Form::open([
                                                    'route' => 'admin.import.store',
                                                    'class' => 'form-horizontal',
                                                    'method' => 'POST',
                                                    'id' => 'formCompany',
                                                    'enctype'=> 'multipart/form-data'

                                                  ])
                                        !!}
                                @include('import._form')
                        <div class="box-footer">
                            <a href="{{ route('admin.import.index') }}" class="btn btn-default">Cancelar</a>
                            {!! Form::submit('Salvar Alterações',['class'=>'btn btn-info pull-right']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection


@section('script')


@endsection
