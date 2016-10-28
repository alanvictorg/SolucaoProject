@extends('layouts.app')

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
                    <button class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Cadastrar Empresa</button>
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
                                    <a href='{{ route('city.edit', ['city_id'=>$company->id])}}' class="btn btn-action btn-info"><i class="fa fa-edit"></i></a>
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
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                @if($errors->any())
                    <ul class="alert">
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
                {!! Form::open([
                            'class' => 'form-horizontal',
                            'id' => 'formCompany',
                            'enctype'=> 'multipart/form-data',
                          ])
                !!}
                @include('companies._form')
                <div class="box-footer">
                    <a href="{{ route('company.index') }}" class="btn btn-default">Cancelar</a>
                    {!! Form::submit('Salvar',['class'=>'btn btn-info pull-right']) !!}
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
    <script>

    </script>
@endsection
