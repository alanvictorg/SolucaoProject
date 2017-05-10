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
                            <div class="col-md-6">
                                Informacoes
                                Duracao:{!! $task->Finish  !!}{{$task->Start}}
                                Custo:
                                DI
                                DT
                                Recurso
                                Anotacoes
                            </div>
                            <div class="col-md-6">
                                Gantt com Predecessora e sucessora
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