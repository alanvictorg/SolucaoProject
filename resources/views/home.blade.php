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
                   <div class="col-md-3">
                       <div class="box">
                           <div class="box-header">Projeto Green Garden 1</div>
                           <div class="box-body">
                               <div class="pulmograma">
                                   <canvas id="myChart0" width="400" height="400"></canvas>
                               </div>
                               <div class="last-tasks">
                                    <ul class="list-group">
                                        <li class="list-group-item">LIMPEZA INTERNA HALL 21° PAV - WIND TOWER</li>
                                        <li class="list-group-item">LIMPEZA INTERNA HALL 20° PAV - WIND TOWER</li>
                                        <li class="list-group-item">LIMPEZA INTERNA HALL 19° PAV - WIND TOWER</li>
                                    </ul>
                               </div>
                               <div class="last-info">
                                   <ul class="list-group">
                                       <li class="list-group-item">Data Início: 03/03/2014</li>
                                       <li class="list-group-item">Data Fim: 17/08/2020</li>
                                   </ul>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-3">
                       <div class="box">
                           <div class="box-header">Projeto Green Garden 1</div>
                           <div class="box-body">
                               <div class="pulmograma">
                                   <canvas id="myChart1" width="400" height="400"></canvas>
                               </div>
                               <div class="last-tasks">
                                    <ul class="list-group">
                                        <li class="list-group-item">LIMPEZA INTERNA HALL 21° PAV - WIND TOWER</li>
                                        <li class="list-group-item">LIMPEZA INTERNA HALL 20° PAV - WIND TOWER</li>
                                        <li class="list-group-item">LIMPEZA INTERNA HALL 19° PAV - WIND TOWER</li>
                                    </ul>
                               </div>
                               <div class="last-info">
                                   <ul class="list-group">
                                       <li class="list-group-item">Data Início: 03/03/2014</li>
                                       <li class="list-group-item">Data Fim: 17/08/2020</li>
                                   </ul>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-3">
                       <div class="box">
                           <div class="box-header">Projeto Green Garden 1</div>
                           <div class="box-body">
                               <div class="pulmograma">
                                   <canvas id="myChart2" width="400" height="400"></canvas>
                               </div>
                               <div class="last-tasks">
                                    <ul class="list-group">
                                        <li class="list-group-item">LIMPEZA INTERNA HALL 21° PAV - WIND TOWER</li>
                                        <li class="list-group-item">LIMPEZA INTERNA HALL 20° PAV - WIND TOWER</li>
                                        <li class="list-group-item">LIMPEZA INTERNA HALL 19° PAV - WIND TOWER</li>
                                    </ul>
                               </div>
                               <div class="last-info">
                                   <ul class="list-group">
                                       <li class="list-group-item">Data Início: 03/03/2014</li>
                                       <li class="list-group-item">Data Fim: 17/08/2020</li>
                                   </ul>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-3">
                       <div class="box">
                           <div class="box-header">Projeto Green Garden 1</div>
                           <div class="box-body">
                               <div class="pulmograma">
                                   <canvas id="myChart3" width="400" height="400"></canvas>
                               </div>
                               <div class="last-tasks">
                                    <ul class="list-group">
                                        <li class="list-group-item">LIMPEZA INTERNA HALL 21° PAV - WIND TOWER</li>
                                        <li class="list-group-item">LIMPEZA INTERNA HALL 20° PAV - WIND TOWER</li>
                                        <li class="list-group-item">LIMPEZA INTERNA HALL 19° PAV - WIND TOWER</li>
                                    </ul>
                               </div>
                               <div class="last-info">
                                   <ul class="list-group">
                                       <li class="list-group-item">Data Início: 03/03/2014</li>
                                       <li class="list-group-item">Data Fim: 17/08/2020</li>
                                   </ul>
                               </div>
                           </div>
                       </div>
                   </div>
           </section>

        </section>
        <!-- /.content -->
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
