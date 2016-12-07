@extends('layouts.base')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Listagem de Cidades
            <small>Cidades do Sistema</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home.index') }}"><i class="fa fa-dashboard"></i> Inicial</a></li>
            <li class="active">Cidades</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Cidades cadastradas</h3>

                <div class="box-tools">
                    <!-- Large modal -->
                    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modalCompanyCreate">Novo</button>
                </div>
            <div class="box-body">
                @if ( session()->has('message') )
                    <div class="alert alert-success alert-dismissable">{{ session()->get('message') }}</div>
                @endif
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Cidade</th>
                        <th>Estado</th>
                        <th>Data de Criação</th>
                        <th style="width: 5px;" colspan="2" class="text-center">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($companies)
                        @foreach($companies as $company)
                            <tr>
                                <td>{{ $company->id }}</td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->created_at }}</td>
                                <td  style="width: 5px;">
                                    <a href='{{ route('company.edit', ['company_id'=>$company->id])}}' class="btn btn-action btn-info"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5">Não há dados para exibir</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">

            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
    <div class="modal fade" id="modalCompanyCreate" tabindex="-1" role="dialog" aria-labelledby="modalCompanyCreateLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modalCompanyCreateLabel">New message</h4>
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
@endsection

@section('script')
    <script>
        function createCompany() {
            var data = $('#form-create').serialize();
            $.ajax({
                type:'post',
                url:'{!!route('company.store')!!}',
                data :data,
                success:function(date){
                    $('#myModal').modal('hide');
                },error:function(){

                }
            });
        }
    </script>
@endsection
