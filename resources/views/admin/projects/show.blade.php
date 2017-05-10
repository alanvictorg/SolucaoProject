@extends('layouts.base')
@section('page_styles')

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['gantt']});
        google.charts.setOnLoadCallback(drawChart);

        function daysToMilliseconds(days) {
            return days * 24 * 60 * 60 * 1000;
        }

        function drawChart() {

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Task ID');
            data.addColumn('string', 'Task Name');
            data.addColumn('date', 'Start Date');
            data.addColumn('date', 'End Date');
            data.addColumn('number', 'Duration');
            data.addColumn('number', 'Percent Complete');
            data.addColumn('string', 'Dependencies');

            data.addRows([
                ['Research', 'Find sources',
                    new Date(2015, 0, 1), new Date(2015, 0, 5), null,  100,  null],
                ['Write', 'Write paper',
                    null, new Date(2015, 0, 9), daysToMilliseconds(3), 25, 'Research,Outline'],
                ['Cite', 'Create bibliography',
                    null, new Date(2015, 0, 7), daysToMilliseconds(1), 20, 'Research'],
                ['Complete', 'Hand in paper',
                    null, new Date(2015, 0, 10), daysToMilliseconds(1), 0, 'Cite,Write'],
                ['Outline', 'Outline paper',
                    null, new Date(2015, 0, 6), daysToMilliseconds(1), 100, 'Research']
            ]);

            var options = {
                height: 275
            };

            var chart = new google.visualization.Gantt(document.getElementById('chart_div'));

            chart.draw(data, options);
        }
    </script>
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
                        <li class="nav-item"><a href="" class="nav-link " data-target="#tasks-pills"
                                                aria-controls="home-pills" data-toggle="tab" role="tab">Tarefas</a></li>
                        <li class="nav-item"><a href="" class="nav-link " data-target="#tasks-resource-pills"
                                                aria-controls="home-pills" data-toggle="tab" role="tab">Tarefas Por Recurso</a></li>
                        <li class="nav-item"><a href="" class="nav-link active" data-target="#charts-pills"
                                                aria-controls="profile-pills" data-toggle="tab" role="tab">Gráficos</a>
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
                                    <tr>
                                        <td> {{$task->WBS}}</td>
                                        <td> {{$task->Name}}</td>
                                        <td> {{$task->Duration}}</td>
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
                                <div id="chart_div" style="width: 100%; height: 800px;"></div>

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

                            </div>
                            Gantt

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

@endsection