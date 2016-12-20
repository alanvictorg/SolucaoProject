@extends('layouts.base')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Tarefas Cadastradas
                <small>Projetos</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home.index') }}"><i class="fa fa-dashboard"></i> Inicial</a></li>
                <li class="active">Tarefas</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header">Tarefas Cadastradas
                            <div class="box-tools">
                                <!-- Large modal -->
                                <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modalTaskCreate">Novo</button>
                            </div>
                        </div>
                        <div class="box-body">
                            @if ( session()->has('message') )
                                <div class="alert alert-success alert-dismissable">{{ session()->get('message') }}</div>
                            @endif
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Empresa</th>
                                    <th>Projeto</th>
                                    <th>Tarefa</th>
                                    <th>Data de Criação</th>
                                    <th style="width: 5px;" colspan="2" class="text-center">Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(!$tasks->isEmpty())
                                    @foreach($tasks as $task)
                                        <tr>
                                            <td>{{ $task->id }}</td>
                                            <td>{{ $task->company->name }}</td>
                                            <td>{{ $task->Title }}</td>
                                            <td>{{ $task->created_at }}</td>
                                            <td  style="width: 5px;">
                                                <a href='{{ route('company.edit', [$task->id])}}' class="btn btn-action btn-info"><i class="ion ion-edit"></i></a>
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
