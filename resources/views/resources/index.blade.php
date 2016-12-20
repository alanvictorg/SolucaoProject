@extends('layouts.base')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               Relatórios
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home.index') }}"><i class="fa fa-dashboard"></i>Inicial</a></li>
                <li class="active">Relatórios</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header">Relatórios 
                            <div class="box-tools">
                                <!-- Large modal -->
                                <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modalCompanyCreate">Novo</button>
                            </div>
                        </div>
                        <div class="box-body">
                           
                        </div>
                    </div>
                </div>
        </section>
        <!-- /.content -->
        <div class="modal fade" id="modalCompanyCreate" tabindex="-1" role="dialog" aria-labelledby="modalCompanyCreateLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="modalCompanyCreateLabel">Cadastro de Empresa</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::open([
                                    'route' => ['company.store'],
                                    'class' => 'form-horizontal',
                                    'method' => 'POST',
                                    'id' => 'formCompany',
                                    'enctype'=> 'multipart/form-data',

                                  ])
                        !!}
                        @include('companies._form')

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        {!! Form::submit('Salvar',['class'=>'btn btn-info pull-right']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')


@endsection
