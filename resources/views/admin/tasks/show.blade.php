@extends('layouts.base')
@section('page_styles')


@endsection

@section('content')
    <article class="content items-list-page">
        <div class="title-block">
            <h3 class="title">
                Tarefa  - {{ $task->Name }}
            </h3>
            <p class="title-description"></p>
        </div>
        <section class="section">
            <div class="row sameheight-container">
                <!-- /.col-xl-6 -->
                <div class="col-xl-12">
                    <div class="card sameheight-item">
                        <div class="card-block">
                            <div class="row">
                            <div class="col-md-6">
                                <h1>Informações</h1>
                                <h4>Duracao: {!! $duration !!} dias</h4>
                                <h4>Custo: {!! $custo !!}</h4>
                                <h4>Início: {!! $task->Start->format('d/m/Y') !!}</h4>
                                <h4>Fim:  {!! $task->Finish->format('d/m/Y') !!}</h4>
                                <h4>Recurso: </h4>
                                <h4>Anotacoes:
                                    @can('tasks-edit')
                                        {!! Form::textarea('annotations', isset($task->annotation)? $task->annotation : "", ['class'=>'form-control','autofocus', "placeholder"=>'Sem observações']) !!}
                                    @elsecan('tasks-view')
                                        {!! isset($task->annotation)? $task->annotation : "Sem observações" !!}

                                    @endcan
                                </h4>

                            </div>
                            <div class="col-md-6">
                                Gantt com Predecessora e sucessora
                            </div>
                            </div>
                        </div>
                        <!-- /.card-block -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-xl-6 -->
            </div>
        </section>
    </article>

@endsection

@section('page_scripts')
    <!-- Load JS here for greater good =============================-->

    <script>

        $(function(){

            var ua = window.navigator.userAgent;
            var msie = ua.indexOf("MSIE ");

            /*if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {

             $('.modes #modeContent').parent().hide();

             } else {

             $('.modes #modeContent').parent().show();

             }*/




        })
@endsection