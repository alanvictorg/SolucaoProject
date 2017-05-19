@extends('layouts.base')
@section('page_styles')
    {!! Html::style('assets/plugins/codebase/dhtmlxgantt.css') !!}
@endsection

@section('content')
    <article class="content items-list-page">
        <div class="title-block">
            <h3 class="title">
                Projeto - {{ $project->Title }}
            </h3>
            <p class="title-description">
            <div class="card-info">
                Data Criação: {!! $project->CreationDate->format('d/m/Y') !!}
                Data Inicio: {!! $project->StartDate->format('d/m/Y') !!}
                Data Prevista Fim: {!! $project->StartDate->format('d/m/Y') !!}
            </div>
            <div class="card-danger">
                Custo Total do Projeto:
                Custo Já Consumido:
            </div>
            </p>
        </div>
        <section class="section">
            <div class="row sameheight-container">
                <div class="">
                    <ul class="nav nav-pills nav-justified">
                        <li class="nav-item"><a href="" class="nav-link active " data-target="#tasks-pills"
                                                aria-controls="home-pills" data-toggle="tab" role="tab">Tarefas</a></li>
                        <li class="nav-item"><a href="" class="nav-link " data-target="#tasks-resource-pills"
                                                aria-controls="home-pills" data-toggle="tab" role="tab">Tarefas Por
                                Recurso</a></li>
                        <li class="nav-item"><a href="" class="nav-link " data-target="#charts-pills"
                                                aria-controls="profile-pills" data-toggle="tab"
                                                role="tab">Pulmograma</a>
                        </li>
                        <li class="nav-item"><a href="" class="nav-link" data-target="#resources-pills"
                                                aria-controls="messages-pills" data-toggle="tab" role="tab">Recursos</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tasks-pills">

                            <div id="gantt" style='width:100%; height:400px;'></div>
                        </div>
                        <div class="tab-pane fade" id="tasks-resource-pills">
                            Gantt

                            Lista do Recursos - Ao clicar ele vai mostrar todas as tarefasalocadas. prioridade por data.

                            <div class="col-md-12">
                                {{--<div id="chart_div" style="width: 100%; height: 800px;"></div>--}}

                            </div>
                        </div>
                        <div class="tab-pane fade" id="charts-pills">
                            Pulmograma
                            <div class="col-md-12">
                                Gráfico Área com pontos
                                <div id="pulmograma" style="width: 100%; height: 800px;"></div>

                            </div>
                            <h1>% Avanço da Corrente Crítica: 10%</h1>
                            <h1>% Consumo do Pulmão: 10%</h1>
                            <h1>% Custo Real: R$ 1.000,00</h1>
                            <h1>Termino Planejado: 30/12/2018</h1>
                            <h1>Termino Previsto: 10/10/2017 </h1>
                            <h1>Anotações: </h1>
                            {!! Form::textarea('anotation',"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium architecto aut, autem beatae blanditiis eligendi excepturi harum iusto libero natus neque, nulla pariatur perspiciatis quo repellat repellendus repudiandae temporibus vel." ) !!}
                            <p></p>

                        </div>
                        <div class="tab-pane fade" id="resources-pills">

                        </div>

                    </div>
                </div>
            </div>
        </section>
    </article>

@endsection

@section('page_scripts')
    {!! Html::script('assets/plugins/codebase/dhtmlxgantt.js') !!}
    {!! Html::script('assets/plugins/codebase/ext/dhtmlxgantt_smart_rendering.js') !!}
    {!! Html::script('assets/plugins/codebase/locale/locale_pt.js') !!}
    {!! Html::script('assets/plugins/codebase/ext/dhtmlxgantt_tooltip.js') !!}
    <script type="text/javascript">
                gantt.config.readonly = true;
//        var formatFunc = gantt.date.str_to_date("%d/%m/%Y");
        gantt.attachEvent("onLoadEnd", function () {
            gantt.message({
                text: "Loaded " + gantt.getTaskCount() + " tasks, " + gantt.getLinkCount() + " links",
                expire: 8 * 1000
            });
        });
        gantt.config.highlight_critical_path = true;


        gantt.init("gantt");
        gantt.parse({!! $data_gantt !!});
        gantt.config.date_grid = "%d/%m/%Y";

    </script>
@endsection