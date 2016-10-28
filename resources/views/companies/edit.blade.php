@extends('layouts.app')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Editar Cidades
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('company.index') }}"><i class="fa fa-dashboard"></i> Inicial</a></li>
            <li class="active">Cidades</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box content">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Cidade</h3>

                <div class="box-tools">

                </div>
            </div>
            @if($errors->any())
                <ul class="alert">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif
            <div class="box-body">
                {!! Form::model($company,[
                                                'route' => ['company.update',$company->id],
                                                'class' => 'form-horizontal',
                                                'method' => 'PUT',
                                                'id' => 'formCompany',
                                                'enctype'=> 'multipart/form-data',

                                              ])
                                    !!}
                {!! Form::hidden('id', $company->id) !!}
                @include('companies._form')
                <div class="box-footer">
                    <a href="{{ route('company.index') }}" class="btn btn-default">Cancelar</a>
                    {!! Form::submit('Salvar Alterações',['class'=>'btn btn-info pull-right']) !!}
                </div>
                {!! Form::close() !!}
            </div>
            <!-- /.box-body -->
            <div class="box-footer">

            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection
