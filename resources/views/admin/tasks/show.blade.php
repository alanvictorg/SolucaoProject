@extends('layouts.base')
@section('page_styles')
    {!! Html::style('assets/plugins/codebase/dhtmlxgantt.css') !!}


@endsection

@section('content')
    <article class="content items-list-page">
        <div class="title-block">
            <h3 class="title">
                Tarefa - {{ $task->Name }}
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
                                <div class="col-md-12">
                                    Gantt com Predecessora e sucessora
                                    <div id="gantt" style='width:100%; height:400px;'></div>
                                </div>
                                <div class="col-md-12">
                                    <h1>Informações: </h1>
                                    <h4>Duracao: {!! $duration !!} dias</h4>
                                    <h4>Custo: {!! $custo !!}</h4>
                                    <h4>Início: {!! $task->Start->format('d/m/Y') !!}</h4>
                                    <h4>Fim: {!! $task->Finish->format('d/m/Y') !!}</h4>
                                    <h4>Recurso: </h4>
                                    <h4>Anotacoes:
                                        {{--                                    {!! $task !!}--}}
                                        @can('tasks-edit')
                                            {!! Form::model($task,[
                                                'route'=>["$module_name.update", $task],
                                                'method' => 'put',
                                                'files' => true
                                                ])
                                            !!}
                                            {!! Form::textarea('anotation', isset($task->anotation)? $task->anotation : "", ['class'=>'form-control','autofocus', "placeholder"=>'Sem observações']) !!}
                                            {!! Form::submit('Enviar',['class'=>'btn btn-info pull-right']) !!}
                                            {!! Form::close() !!}
                                        @elsecan('tasks-view')
                                            {!! isset($task->annotation)? $task->annotation : "Sem observações" !!}

                                        @endcan
                                    </h4>

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
    {!! Html::script('assets/plugins/codebase/dhtmlxgantt.js') !!}
    {!! Html::script('assets/plugins/codebase/locale/locale_pt.js') !!}
    <script type="text/javascript">
        gantt.config.readonly = true;
        //        var formatFunc = gantt.date.str_to_date("%d/%m/%Y");
        gantt.attachEvent("onLoadEnd", function () {
            gantt.message({
                text: "Carregando " + gantt.getTaskCount() + " tasks, " + gantt.getLinkCount() + " links",
                expire: 8 * 1000
            });
        });
        gantt.config.highlight_critical_path = true;
        gantt.config.open_tree_initially = true;
        gantt.config.work_time = true;
        gantt.config.correct_work_time = true;
        gantt.config.show_progress = true;
        gantt.config.scale_unit = "month";
        gantt.config.step = 1;
        gantt.config.date_scale = "%F, %Y";
        gantt.config.link_arrow_size = 8;
        gantt.config.columns=[
            {name:"text",       label:"Tarefa",  tree:true, width:'*' },
            {name:"start_date", label:"Início", align: "center" },
            {name:"duration",   label:"Duração",   align: "center" },
        ];
        gantt.templates.grid_date_format = function(date){
            return gantt.date.date_to_str(gantt.config.date_grid)(date);
        };
        gantt.config.details_on_dblclick = true;

        gantt.attachEvent("onTaskDblClick", function(id,e){
            window.location = "{!! url('admin/tasks') !!}/"+id;
            return true;
        });
        gantt.config.date_grid = "%d/%m/%Y";
        gantt.init("gantt");
        gantt.parse({!! $data_gantt !!});

    </script>
@endsection