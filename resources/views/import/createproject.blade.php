@extends('layouts.base')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Importação de dados do Project
                <small>Importar Dados</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home.index') }}"><i class="fa fa-dashboard"></i> Inicial</a></li>
                <li class="active">Importar</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header">Aprovação de dados</div>
                        <div class="box-body">
                            @if ( session()->has('message') )
                                <div class="alert alert-success alert-dismissable">{{ session()->get('message') }}</div>
                            @endif
                            @if ( session()->has('errors') )
                                @foreach(session()->get('errors') as $error)
                                    <div class="alert alert-success alert-dismissable">{{$error}}</div>
                                @endforeach
                            @endif
                            {!! Form::open([
                                                'route' => 'admin.import.storeProject',
                                                'class' => 'form-horizontal',
                                                'method' => 'POST',
                                                'id' => 'formCompany',
                                                'enctype'=> 'multipart/form-data'

                                              ])
                                    !!}

                                <div id="error"></div>
                                <div class="form-group">
                                    <label for="city_id" class="col-sm-2 control-label">Empresa</label>
                                    <div class="col-sm-10">
                                        {!! Form::select('company_id',$company,null,['class'=>'form-control', 'required']) !!}
                                    </div>


                                    {!! Form::text('Title', $dados['Title'], ['class' => 'form-control']) !!}
                                    {!! Form::text('Author', $dados['Author'], ['class'=>'form-control']) !!}
                                    {!! Form::text('CreationDate', $dados['CreationDate'], ['class'=>'form-control']) !!}
                                    {!! Form::text('LastSaved', $dados['LastSaved'], ['class'=>'form-control']) !!}
                                    {!! Form::text('StartDate', $dados['StartDate'], ['class'=>'form-control']) !!}
                                    {!! Form::text('FinishDate', $dados['FinishDate'], ['class'=>'form-control']) !!}
                                    {!! Form::text('FYStartDate', $dados['FYStartDate'], ['class'=>'form-control']) !!}
                                    {!! Form::text('CriticalSlackLimit', $dados['CriticalSlackLimit'], ['class'=>'form-control']) !!}
                                    {!! Form::text('CurrencyDigits', $dados['CurrencyDigits'], ['class'=>'form-control']) !!}
                                    {!! Form::text('CurrencySymbol', $dados['CurrencySymbol'], ['class'=>'form-control']) !!}
                                    {!! Form::text('CurrencyCode', $dados['CurrencyCode'], ['class'=>'form-control']) !!}
                                    {!! Form::text('CurrencySymbolPosition', $dados['CurrencySymbolPosition'], ['class'=>'form-control']) !!}
                                    {!! Form::text('CalendarUID', $dados['CalendarUID'], ['class'=>'form-control']) !!}
                                    {!! Form::text('BaselineCalendar', $dados['BaselineCalendar'], ['class'=>'form-control']) !!}
                                    {!! Form::text('DefaultStartTime', $dados['DefaultStartTime'], ['class'=>'form-control']) !!}
                                    {!! Form::text('DefaultFinishTime', $dados['DefaultFinishTime'], ['class'=>'form-control']) !!}
                                    {!! Form::text('MinutesPerDay', $dados['MinutesPerDay'], ['class'=>'form-control']) !!}
                                    {!! Form::text('MinutesPerWeek', $dados['MinutesPerWeek'], ['class'=>'form-control']) !!}
                                    {!! Form::text('DaysPerMonth', $dados['DaysPerMonth'], ['class'=>'form-control']) !!}
                                    {!! Form::text('DefaultTaskType', $dados['DefaultTaskType'], ['class'=>'form-control']) !!}
                                    {!! Form::text('DefaultFixedCostAccrual', $dados['DefaultFixedCostAccrual'], ['class'=>'form-control']) !!}
                                    {!! Form::text('DefaultStandardRate', $dados['DefaultStandardRate'], ['class'=>'form-control']) !!}
                                    {!! Form::text('DefaultOvertimeRate', $dados['DefaultOvertimeRate'], ['class'=>'form-control']) !!}
                                    {!! Form::text('DurationFormat', $dados['DurationFormat'], ['class'=>'form-control']) !!}
                                    {!! Form::text('WorkFormat', $dados['WorkFormat'], ['class'=>'form-control']) !!}
                                    {!! Form::text('EditableActualCosts', $dados['EditableActualCosts'], ['class'=>'form-control']) !!}
                                    {!! Form::text('HonorConstraints', $dados['HonorConstraints'], ['class'=>'form-control']) !!}
                                    {!! Form::text('InsertedProjectsLikeSummary', $dados['InsertedProjectsLikeSummary'], ['class'=>'form-control']) !!}
                                    {!! Form::text('MultipleCriticalPaths', $dados['MultipleCriticalPaths'], ['class'=>'form-control']) !!}
                                    {!! Form::text('NewTasksEffortDriven', $dados['NewTasksEffortDriven'], ['class'=>'form-control']) !!}
                                    {!! Form::text('NewTasksEstimated', $dados['NewTasksEstimated'], ['class'=>'form-control']) !!}
                                    {!! Form::text('SplitsInProgressTasks', $dados['SplitsInProgressTasks'], ['class'=>'form-control']) !!}
                                    {!! Form::text('SpreadActualCost', $dados['SpreadActualCost'], ['class'=>'form-control']) !!}
                                    {!! Form::text('SpreadPercentComplete', $dados['SpreadPercentComplete'], ['class'=>'form-control']) !!}
                                    {!! Form::text('TaskUpdatesResource', $dados['TaskUpdatesResource'], ['class'=>'form-control']) !!}
                                    {!! Form::text('FiscalYearStart', $dados['FiscalYearStart'], ['class'=>'form-control']) !!}
                                    {!! Form::text('WeekStartDay', $dados['WeekStartDay'], ['class'=>'form-control']) !!}
                                    {!! Form::text('MoveCompletedEndsBack', $dados['MoveCompletedEndsBack'], ['class'=>'form-control']) !!}
                                    {!! Form::text('MoveRemainingStartsBack', $dados['MoveRemainingStartsBack'], ['class'=>'form-control']) !!}
                                    {!! Form::text('MoveRemainingStartsForward', $dados['MoveRemainingStartsForward'], ['class'=>'form-control']) !!}
                                    {!! Form::text('MoveCompletedEndsForward', $dados['MoveCompletedEndsForward'], ['class'=>'form-control']) !!}
                                    {!! Form::text('BaselineForEarnedValue', $dados['BaselineForEarnedValue'], ['class'=>'form-control']) !!}
                                    {!! Form::text('AutoAddNewResourcesAndTasks', $dados['AutoAddNewResourcesAndTasks'], ['class'=>'form-control']) !!}
                                    {!! Form::text('StatusDate', $dados['StatusDate'], ['class'=>'form-control']) !!}
                                    {!! Form::text('CurrentDate', $dados['CurrentDate'], ['class'=>'form-control']) !!}
                                    {!! Form::text('Autolink', $dados['Autolink'], ['class'=>'form-control']) !!}
                                    {!! Form::text('NewTaskStartDate', $dados['NewTaskStartDate'], ['class'=>'form-control']) !!}
                                    {!! Form::text('NewTasksAreManual', $dados['NewTasksAreManual'], ['class'=>'form-control']) !!}
                                    {!! Form::text('DefaultTaskEVMethod', $dados['DefaultTaskEVMethod'], ['class'=>'form-control']) !!}
                                    {!! Form::text('ProjectExternallyEdited', $dados['ProjectExternallyEdited'], ['class'=>'form-control']) !!}
                                    {!! Form::text('ExtendedCreationDate', $dados['ExtendedCreationDate'], ['class'=>'form-control']) !!}
                                    {!! Form::text('ActualsInSync', $dados['ActualsInSync'], ['class'=>'form-control']) !!}
                                    {!! Form::text('RemoveFileProperties', $dados['RemoveFileProperties'], ['class'=>'form-control']) !!}
                                    {!! Form::text('AdminProject', $dados['AdminProject'], ['class'=>'form-control']) !!}
                                    {!! Form::text('UpdateManuallyScheduledTasksWhenEditingLinks', $dados['UpdateManuallyScheduledTasksWhenEditingLinks'], ['class'=>'form-control']) !!}
                                    {!! Form::text('KeepTaskOnNearestWorkingTimeWhenMadeAutoScheduled', $dados['KeepTaskOnNearestWorkingTimeWhenMadeAutoScheduled'] ,['class'=>'form-control']) !!}
                                    {{--@foreach($dados['Tasks']['Task'] as $task)--}}
                                        {{--{{ dd($task) }}--}}
                                    {{--@endforeach--}}
                                </div>
                            <div class="box-footer">
                                <a href="{{ route('admin.import.index') }}" class="btn btn-default">Cancelar</a>
                                {!! Form::submit('Salvar Alterações',['class'=>'btn btn-info pull-right']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
        </section>
        <!-- /.content -->
    </div>
@endsection