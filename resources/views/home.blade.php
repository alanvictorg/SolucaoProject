@extends('layouts.base')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Central de Controle</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Inicial</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
           <section class="projects-list">
               <div class="row">
                   @if(!$projects->isEmpty())
                        @foreach($projects->take(5) as $project)
                           <div class="col-md-3">
                               <div class="box">
                                   <div class="box-header">{{ $project->Title }}</div>
                                   <div class="box-body">
                                       <div class="pulmograma">
                                           <canvas id="myChart0" width="400" height="400"></canvas>
                                       </div>
                                       <div class="last-tasks">
                                            <ul class="list-group">
                                                @foreach($project->tasks->take(5) as $task)
                                                    <li class="list-group-item">{{$task->Name}} - {{ $task->PercentComplete }} %</li>
                                                @endforeach
                                            </ul>
                                       </div>
                                       <div class="last-info">
                                           <ul class="list-group">
                                               <li class="list-group-item">Data Início: {{ $project->StartDate->format('d-m-Y') }}</li>
                                               <li class="list-group-item">Data Fim: {{ $project->FinishDate->format('d-m-Y') }}</li>
                                           </ul>
                                       </div>
                                   </div>
                               </div>
                           </div>
                        @endforeach
                    @else
                       <div class="col-md-12">
                           <div class="box">
                               <div class="box-header">Sem Informações para Exibir</div>
                               <div class="box-body">
                                   <a href="{{route('admin.import.index')}}" class="btn btn-info"> Importar XML</a>
                               </div>
                           </div>
                       </div>
                    @endif
           </section>

        </section>
        <!-- /.content -->
    </div>
</div>
@endsection


@section('script')
    {{ Html::script('https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js') }}
    <script>
        var ctx = document.getElementById("myChart0");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["0", "10", "20", "30", "40", "50", "60", "70", "80", "90", "100"],
                datasets: [{
                    label: 'Pulmograma',
                    data: [ {x:0,y:10},{x:0,y:10},{x:15,y:20},{x:30,y:40}],
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true,
                            min:0,
                            max:100
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            beginAtZero:true,
                            min:0,
                            max:100
                        }
                    }]
                }
            }
        });
        var ctx = document.getElementById("myChart1");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["0", "10", "20", "30", "40", "50", "60", "70", "80", "90", "100"],
                datasets: [{
                    label: 'Pulmograma',
                    data: [ {x:0,y:10},{x:0,y:10},{x:15,y:20},{x:30,y:40}],
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true,
                            min:0,
                            max:100
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            beginAtZero:true,
                            min:0,
                            max:100
                        }
                    }]
                }
            }
        });
        var ctx = document.getElementById("myChart2");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["0", "10", "20", "30", "40", "50", "60", "70", "80", "90", "100"],
                datasets: [{
                    label: 'Pulmograma',
                    data: [ {x:0,y:10},{x:0,y:10},{x:15,y:20},{x:30,y:40}],
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true,
                            min:0,
                            max:100
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            beginAtZero:true,
                            min:0,
                            max:100
                        }
                    }]
                }
            }
        });
        var ctx = document.getElementById("myChart3");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["0", "10", "20", "30", "40", "50", "60", "70", "80", "90", "100"],
                datasets: [{
                    label: 'Pulmograma',
                    data: [ {x:0,y:10},{x:0,y:10},{x:15,y:20},{x:30,y:40}],
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true,
                            min:0,
                            max:100
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            beginAtZero:true,
                            min:0,
                            max:100
                        }
                    }]
                }
            }
        });
    </script>

@endsection
