@extends('layouts.base')
@section('page_styles')
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
                                                aria-controls="home-pills" data-toggle="tab" role="tab">Tarefas Por Recurso</a></li>
                        <li class="nav-item"><a href="" class="nav-link " data-target="#charts-pills"
                                                aria-controls="profile-pills" data-toggle="tab" role="tab">Pulmograma</a>
                        </li>
                        <li class="nav-item"><a href="" class="nav-link" data-target="#resources-pills"
                                                aria-controls="messages-pills" data-toggle="tab" role="tab">Recursos</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tasks-pills">
                            <div class="col-md-6">
                            <table class="table table-responsive table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Tempo</th>
                                    <th>% Conclusão</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($project->tasks as $task)
                                    <?php
                                    $date_finish = \Carbon\Carbon::parse($task->Finish);
                                    $date_start = \Carbon\Carbon::parse($task->Start);
                                    $duration = $date_finish->diffInDays($date_start);

                                    ?>
                                    <tr>
                                        <td> {{$task->WBS}}</td>
                                        <td><a href="{{ route('tasks.show', [$task]) }}"> {{$task->Name}}</a></td>
                                        <td> {{$duration}} dias</td>
                                        <td {!!  $task->PercentComplete == 100.00 ? 'class="text-success"' : "" !!}> {{$task->PercentComplete }}
                                            %
                                        </td>
                                        <td> bow</td>
                                    </tr>
                                @empty
                                @endforelse


                                </tbody>
                            </table>
                            </div>
                            <div class="col-md-6">
                                GANTT
                                <div id="pulmograma" style="width: 100%; height: 800px;"></div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="tasks-resource-pills">
                            Gantt

                            Lista do Recursos  -Ao clicar ele vai mostrar todas as tarefasalocadas. prioridade por data.

                            <div class="col-md-12">
                                {{--<div id="chart_div" style="width: 100%; height: 800px;"></div>--}}

                            </div>
                        </div><div class="tab-pane fade" id="charts-pills">
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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        $( document ).ready(function() {
            google.charts.load("current", {packages: ["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['% Cpl', 'VERDE', 'AMARELO', 'VERMELHO'],
//                    ['0',   -.2,0,1,],
                    ['10',  0,0,100],
                    ['20',  0,0,100],
                    ['30',  0,0,100],
                    ['40',  0,0,100],
                    ['50',  0,0,100],
                    ['60',  0,100,100],
                    ['70',  0,100,100],
                    ['80',  100,100,100],
                    ['90',  100,100,100],
                    ['100', 100,100,100],
                ]);


                var options = {
//                    backgroundColor: ['#0dc010', '#eff108','#e0440e','#000'],
                    vAxis: {
                        minValue: 0,
                        ticks: [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100]
                    },
                    hAxis: {title: 'Consumo Corrente Crítica',  titleTextStyle: {color: 'red'}},
                    // Allow multiple
                    // simultaneous selections.
                    selectionMode: 'multiple',
                    // Trigger tooltips
                    // on selections.
                    tooltip: {trigger: 'selection'},
                    // Group selections
                    // by x-value.
                    aggregationTarget: 'category',
                    boxStyle: {
                        // Color of the box outline.
                        stroke: '#888',
                        // Thickness of the box outline.
                        strokeWidth: 1,
                        // x-radius of the corner curvature.
                        rx: 10,
                        // y-radius of the corner curvature.
                        ry: 10,
                        // Attributes for linear gradient fill.
                        gradient: {
                            // Start color for gradient.
                            color1: '#0dc010',
                            // Finish color for gradient.
                            color2: '#eff108',
                            // Where on the boundary to start and
                            // end the color1/color2 gradient,
                            // relative to the upper left corner
                            // of the boundary.
                            x1: '0%', y1: '0%',
                            x2: '100%', y2: '100%',
                            // If true, the boundary for x1,
                            // y1, x2, and y2 is the box. If
                            // false, it's the entire chart.
                            useObjectBoundingBoxUnits: true
                        }
                    }
                };

                var chart = new google.visualization.AreaChart(document.getElementById('pulmograma'));
                chart.draw(data, options);
            }
        });

    </script>
@endsection