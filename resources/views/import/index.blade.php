@extends('layouts.base')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Importação de dados
            <small>Importaçao de dados vindo do Project</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home.index') }}"><i class="fa fa-dashboard"></i> Inicial</a></li>
            <li class="active">Importação de Dados</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Importação Project</h3>

                <div class="box-tools">
                    <!-- Large modal -->
                    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#modalCompanyCreate">Iportar</button>
                </div>
            <div class="box-body">

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
