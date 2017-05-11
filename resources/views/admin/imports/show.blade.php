@extends('layouts.base')
@section('page_styles')


@endsection

@section('content')
    <article class="content items-list-page">
        <div class="title-block">
            <h3 class="title">
                Importacao do Arquivo XML - Atualizacao de Dados
            </h3>
            <p class="title-description"></p>
        </div>
        <section class="section">
            <div class="row sameheight-container">
                preencher um formulario para poder importar projeto e tarefas. com base no xml.
                <div class="card sameheight-item">
                    <div class="card-block">
                        <div class="card-title-block">
                            <h3 class="title">
                                Usuário
                            </h3></div>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-justified">
                            <li class="nav-item">
                                <a href="" class="nav-link active" data-target="#home-pills"
                                   aria-controls="home-pills" data-toggle="tab" role="tab">Projeto</a>
                            </li>
                            <li class="nav-item"><a href="" class="nav-link" data-target="#profile-pills"
                                                    aria-controls="profile-pills" data-toggle="tab"
                                                    role="tab">Tarefas</a></li>
                            <li class="nav-item"><a href="" class="nav-link" data-target="#resource-pills"
                                                    aria-controls="resource-pills" data-toggle="tab"
                                                    role="tab">Recursos</a></li>
                            <li class="nav-item"><a href="" class="nav-link" data-target="#import-pills"
                                                    aria-controls="import-pills" data-toggle="tab"
                                                    role="tab">Importar</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="home-pills">
                                <h4>{!! $projeto['Title'] !!}</h4>
                                {!! Form::open(['url'=>route('imports.import')]) !!}

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("Title","Title",'Titulo', ['class'=>'flabel']) !!}
                                            {!! Form::text("project[Title]", $projeto['Title'], ['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("Author","Author", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[Author]", $projeto["Author"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("CreationDate","CreationDate", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[CreationDate]", $projeto["CreationDate"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("LastSaved","LastSaved", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[LastSaved]", $projeto["LastSaved"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("ScheduleFromStart","ScheduleFromStart", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[ScheduleFromStart]", $projeto["ScheduleFromStart"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("StartDate","StartDate", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[StartDate]", $projeto["StartDate"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("FinishDate","FinishDate", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[FinishDate]", $projeto["FinishDate"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("FYStartDate","FYStartDate", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[FYStartDate]", $projeto["FYStartDate"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("CriticalSlackLimit","CriticalSlackLimit", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[CriticalSlackLimit]", $projeto["CriticalSlackLimit"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("CurrencyDigits","CurrencyDigits", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[CurrencyDigits]", $projeto["CurrencyDigits"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("CurrencySymbol","CurrencySymbol", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[CurrencySymbol]", $projeto["CurrencySymbol"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("CurrencyCode","CurrencyCode", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[CurrencyCode]", $projeto["CurrencyCode"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("CurrencySymbolPosition","CurrencySymbolPosition", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[CurrencySymbolPosition]", $projeto["CurrencySymbolPosition"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("CalendarUID","CalendarUID", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[CalendarUID]", $projeto["CalendarUID"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("BaselineCalendar","BaselineCalendar", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[BaselineCalendar]", $projeto["BaselineCalendar"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("DefaultStartTime","DefaultStartTime", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[DefaultStartTime]", $projeto["DefaultStartTime"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("DefaultFinishTime","DefaultFinishTime", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[DefaultFinishTime]", $projeto["DefaultFinishTime"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("MinutesPerDay","MinutesPerDay", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[MinutesPerDay]", $projeto["MinutesPerDay"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("MinutesPerWeek","MinutesPerWeek", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[MinutesPerWeek]", $projeto["MinutesPerWeek"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("DaysPerMonth","DaysPerMonth", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[DaysPerMonth]", $projeto["DaysPerMonth"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("DefaultTaskType","DefaultTaskType", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[DefaultTaskType]", $projeto["DefaultTaskType"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("DefaultFixedCostAccrual","DefaultFixedCostAccrual", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[DefaultFixedCostAccrual]", $projeto["DefaultFixedCostAccrual"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("DefaultStandardRate","DefaultStandardRate", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[DefaultStandardRate]", $projeto["DefaultStandardRate"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("DefaultOvertimeRate","DefaultOvertimeRate", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[DefaultOvertimeRate]", $projeto["DefaultOvertimeRate"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("DurationFormat","DurationFormat", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[DurationFormat]", $projeto["DurationFormat"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("WorkFormat","WorkFormat", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[WorkFormat]", $projeto["WorkFormat"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("EditableActualCosts","EditableActualCosts", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[EditableActualCosts]", $projeto["EditableActualCosts"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("HonorConstraints","HonorConstraints", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[HonorConstraints]", $projeto["HonorConstraints"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("InsertedProjectsLikeSummary","InsertedProjectsLikeSummary", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[InsertedProjectsLikeSummary]", $projeto["InsertedProjectsLikeSummary"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("MultipleCriticalPaths","MultipleCriticalPaths", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[MultipleCriticalPaths]", $projeto["MultipleCriticalPaths"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("NewTasksEffortDriven","NewTasksEffortDriven", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[NewTasksEffortDriven]", $projeto["NewTasksEffortDriven"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("NewTasksEstimated","NewTasksEstimated", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[NewTasksEstimated]", $projeto["NewTasksEstimated"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("SplitsInProgressTasks","SplitsInProgressTasks", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[SplitsInProgressTasks]", $projeto["SplitsInProgressTasks"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("SpreadActualCost","SpreadActualCost", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[SpreadActualCost]", $projeto["SpreadActualCost"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("SpreadPercentComplete","SpreadPercentComplete", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[SpreadPercentComplete]", $projeto["SpreadPercentComplete"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("TaskUpdatesResource","TaskUpdatesResource", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[TaskUpdatesResource]", $projeto["TaskUpdatesResource"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("FiscalYearStart","FiscalYearStart", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[FiscalYearStart]", $projeto["FiscalYearStart"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("WeekStartDay","WeekStartDay", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[WeekStartDay]", $projeto["WeekStartDay"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("MoveCompletedEndsBack","MoveCompletedEndsBack", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[MoveCompletedEndsBack]", $projeto["MoveCompletedEndsBack"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("MoveRemainingStartsBack","MoveRemainingStartsBack", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[MoveRemainingStartsBack]", $projeto["MoveRemainingStartsBack"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("MoveRemainingStartsForward","MoveRemainingStartsForward", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[MoveRemainingStartsForward]", $projeto["MoveRemainingStartsForward"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("MoveCompletedEndsForward","MoveCompletedEndsForward", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[MoveCompletedEndsForward]", $projeto["MoveCompletedEndsForward"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("BaselineForEarnedValue","BaselineForEarnedValue", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[BaselineForEarnedValue]", $projeto["BaselineForEarnedValue"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("AutoAddNewResourcesAndTasks","AutoAddNewResourcesAndTasks", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[AutoAddNewResourcesAndTasks]", $projeto["AutoAddNewResourcesAndTasks"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("StatusDate","StatusDate", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[StatusDate]", $projeto["StatusDate"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("CurrentDate","CurrentDate", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[CurrentDate]", $projeto["CurrentDate"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("MicrosoftProjectServerURL","MicrosoftProjectServerURL", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[MicrosoftProjectServerURL]", $projeto["MicrosoftProjectServerURL"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("Autolink","Autolink", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[Autolink]", $projeto["Autolink"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("NewTaskStartDate","NewTaskStartDate", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[NewTaskStartDate]", $projeto["NewTaskStartDate"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("NewTasksAreManual","NewTasksAreManual", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[NewTasksAreManual]", $projeto["NewTasksAreManual"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("DefaultTaskEVMethod","DefaultTaskEVMethod", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[DefaultTaskEVMethod]", $projeto["DefaultTaskEVMethod"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("ProjectExternallyEdited","ProjectExternallyEdited", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[ProjectExternallyEdited]", $projeto["ProjectExternallyEdited"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("ExtendedCreationDate","ExtendedCreationDate", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[ExtendedCreationDate]", $projeto["ExtendedCreationDate"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("ActualsInSync","ActualsInSync", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[ActualsInSync]", $projeto["ActualsInSync"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("RemoveFileProperties","RemoveFileProperties", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[RemoveFileProperties]", $projeto["RemoveFileProperties"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("AdminProject","AdminProject", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[AdminProject]", $projeto["AdminProject"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("UpdateManuallyScheduledTasksWhenEditingLinks","UpdateManuallyScheduledTasksWhenEditingLinks", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[UpdateManuallyScheduledTasksWhenEditingLinks]", $projeto["UpdateManuallyScheduledTasksWhenEditingLinks"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {!! Form::label("KeepTaskOnNearestWorkingTimeWhenMadeAutoScheduled","KeepTaskOnNearestWorkingTimeWhenMadeAutoScheduled", ['class'=>'form-label']) !!}
                                            {!! Form::text("project[KeepTaskOnNearestWorkingTimeWhenMadeAutoScheduled]", $projeto["KeepTaskOnNearestWorkingTimeWhenMadeAutoScheduled"], ['class'=>"form-control"]) !!}
                                        </div>
                                    </div>

                                </div>


                            </div>
                            <div class="tab-pane fade" id="profile-pills">
                                <h1>Informações importantes</h1>

                                <div class="col-md-4">
                                    <div class="card-info">
                                        <div class="card-header">Pulmão</div>
                                        <div class="card-text">
                                            {{--{!! print_r($pulmao['Name']) !!}--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card-info">
                                        <div class="card-header">Quantidade de Tarefas</div>
                                        <div class="card-text">
{{--                                            {!! $total_tarefas !!}--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card-info">
                                        <div class="card-header">Pulmão</div>
                                        <div class="card-text">

                                        </div>
                                    </div>
                                </div>

                                {{--@forelse($tasks as $task)--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("UID", "UID", ['class'=>'form-label']) !!} {!! Form::text("UID", $task["UID"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("ID", "ID", ['class'=>'form-label']) !!} {!! Form::text("ID", $task["ID"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("Name", "Name", ['class'=>'form-label']) !!} {!! Form::text("Name", $task["Name"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("Active", "Active", ['class'=>'form-label']) !!} {!! Form::text("Active", $task["Active"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("Manual", "Manual", ['class'=>'form-label']) !!} {!! Form::text("Manual", $task["Manual"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("Type", "Type", ['class'=>'form-label']) !!} {!! Form::text("Type", $task["Type"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("IsNull", "IsNull", ['class'=>'form-label']) !!} {!! Form::text("IsNull", $task["IsNull"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("CreateDate", "CreateDate", ['class'=>'form-label']) !!} {!! Form::text("CreateDate", $task["CreateDate"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("WBS", "WBS", ['class'=>'form-label']) !!} {!! Form::text("WBS", $task["WBS"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("OutlineNumber", "OutlineNumber", ['class'=>'form-label']) !!} {!! Form::text("OutlineNumber", $task["OutlineNumber"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("OutlineLevel", "OutlineLevel", ['class'=>'form-label']) !!} {!! Form::text("OutlineLevel", $task["OutlineLevel"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("Priority", "Priority", ['class'=>'form-label']) !!} {!! Form::text("Priority", $task["Priority"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("Start", "Start", ['class'=>'form-label']) !!} {!! Form::text("Start", $task["Start"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("Finish", "Finish", ['class'=>'form-label']) !!} {!! Form::text("Finish", $task["Finish"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("Duration", "Duration", ['class'=>'form-label']) !!} {!! Form::text("Duration", $task["Duration"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("ManualStart", "ManualStart", ['class'=>'form-label']) !!} {!! Form::text("ManualStart", $task["ManualStart"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("ManualFinish", "ManualFinish", ['class'=>'form-label']) !!} {!! Form::text("ManualFinish", $task["ManualFinish"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("ManualDuration", "ManualDuration", ['class'=>'form-label']) !!} {!! Form::text("ManualDuration", $task["ManualDuration"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("DurationFormat", "DurationFormat", ['class'=>'form-label']) !!} {!! Form::text("DurationFormat", $task["DurationFormat"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("Work", "Work", ['class'=>'form-label']) !!} {!! Form::text("Work", $task["Work"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("Stop", "Stop", ['class'=>'form-label']) !!} {!! Form::text("Stop", $task["Stop"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("Resume", "Resume", ['class'=>'form-label']) !!} {!! Form::text("Resume", $task["Resume"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("ResumeValid", "ResumeValid", ['class'=>'form-label']) !!} {!! Form::text("ResumeValid", $task["ResumeValid"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("EffortDriven", "EffortDriven", ['class'=>'form-label']) !!} {!! Form::text("EffortDriven", $task["EffortDriven"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("Recurring", "Recurring", ['class'=>'form-label']) !!} {!! Form::text("Recurring", $task["Recurring"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("OverAllocated", "OverAllocated", ['class'=>'form-label']) !!} {!! Form::text("OverAllocated", $task["OverAllocated"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("Estimated", "Estimated", ['class'=>'form-label']) !!} {!! Form::text("Estimated", $task["Estimated"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("Milestone", "Milestone", ['class'=>'form-label']) !!} {!! Form::text("Milestone", $task["Milestone"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("Summary", "Summary", ['class'=>'form-label']) !!} {!! Form::text("Summary", $task["Summary"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("DisplayAsSummary", "DisplayAsSummary", ['class'=>'form-label']) !!} {!! Form::text("DisplayAsSummary", $task["DisplayAsSummary"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("Critical", "Critical", ['class'=>'form-label']) !!} {!! Form::text("Critical", $task["Critical"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("IsSubproject", "IsSubproject", ['class'=>'form-label']) !!} {!! Form::text("IsSubproject", $task["IsSubproject"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("IsSubprojectReadOnly", "IsSubprojectReadOnly", ['class'=>'form-label']) !!} {!! Form::text("IsSubprojectReadOnly", $task["IsSubprojectReadOnly"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("ExternalTask", "ExternalTask", ['class'=>'form-label']) !!} {!! Form::text("ExternalTask", $task["ExternalTask"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("EarlyStart", "EarlyStart", ['class'=>'form-label']) !!} {!! Form::text("EarlyStart", $task["EarlyStart"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("EarlyFinish", "EarlyFinish", ['class'=>'form-label']) !!} {!! Form::text("EarlyFinish", $task["EarlyFinish"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("LateStart", "LateStart", ['class'=>'form-label']) !!} {!! Form::text("LateStart", $task["LateStart"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("LateFinish", "LateFinish", ['class'=>'form-label']) !!} {!! Form::text("LateFinish", $task["LateFinish"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("StartVariance", "StartVariance", ['class'=>'form-label']) !!} {!! Form::text("StartVariance", $task["StartVariance"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("FinishVariance", "FinishVariance", ['class'=>'form-label']) !!} {!! Form::text("FinishVariance", $task["FinishVariance"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("WorkVariance", "WorkVariance", ['class'=>'form-label']) !!} {!! Form::text("WorkVariance", $task["WorkVariance"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("FreeSlack", "FreeSlack", ['class'=>'form-label']) !!} {!! Form::text("FreeSlack", $task["FreeSlack"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("TotalSlack", "TotalSlack", ['class'=>'form-label']) !!} {!! Form::text("TotalSlack", $task["TotalSlack"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("StartSlack", "StartSlack", ['class'=>'form-label']) !!} {!! Form::text("StartSlack", $task["StartSlack"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("FinishSlack", "FinishSlack", ['class'=>'form-label']) !!} {!! Form::text("FinishSlack", $task["FinishSlack"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("FixedCost", "FixedCost", ['class'=>'form-label']) !!} {!! Form::text("FixedCost", $task["FixedCost"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("FixedCostAccrual", "FixedCostAccrual", ['class'=>'form-label']) !!} {!! Form::text("FixedCostAccrual", $task["FixedCostAccrual"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("PercentComplete", "PercentComplete", ['class'=>'form-label']) !!} {!! Form::text("PercentComplete", $task["PercentComplete"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("PercentWorkComplete", "PercentWorkComplete", ['class'=>'form-label']) !!} {!! Form::text("PercentWorkComplete", $task["PercentWorkComplete"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("Cost", "Cost", ['class'=>'form-label']) !!} {!! Form::text("Cost", $task["Cost"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("OvertimeCost", "OvertimeCost", ['class'=>'form-label']) !!} {!! Form::text("OvertimeCost", $task["OvertimeCost"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("OvertimeWork", "OvertimeWork", ['class'=>'form-label']) !!} {!! Form::text("OvertimeWork", $task["OvertimeWork"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("ActualStart", "ActualStart", ['class'=>'form-label']) !!} {!! Form::text("ActualStart", $task["ActualStart"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("ActualDuration", "ActualDuration", ['class'=>'form-label']) !!} {!! Form::text("ActualDuration", $task["ActualDuration"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("ActualCost", "ActualCost", ['class'=>'form-label']) !!} {!! Form::text("ActualCost", $task["ActualCost"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("ActualOvertimeCost", "ActualOvertimeCost", ['class'=>'form-label']) !!} {!! Form::text("ActualOvertimeCost", $task["ActualOvertimeCost"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("ActualWork", "ActualWork", ['class'=>'form-label']) !!} {!! Form::text("ActualWork", $task["ActualWork"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("ActualOvertimeWork", "ActualOvertimeWork", ['class'=>'form-label']) !!} {!! Form::text("ActualOvertimeWork", $task["ActualOvertimeWork"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("RegularWork", "RegularWork", ['class'=>'form-label']) !!} {!! Form::text("RegularWork", $task["RegularWork"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("RemainingDuration", "RemainingDuration", ['class'=>'form-label']) !!} {!! Form::text("RemainingDuration", $task["RemainingDuration"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("RemainingCost", "RemainingCost", ['class'=>'form-label']) !!} {!! Form::text("RemainingCost", $task["RemainingCost"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("RemainingWork", "RemainingWork", ['class'=>'form-label']) !!} {!! Form::text("RemainingWork", $task["RemainingWork"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("RemainingOvertimeCost", "RemainingOvertimeCost", ['class'=>'form-label']) !!} {!! Form::text("RemainingOvertimeCost", $task["RemainingOvertimeCost"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("RemainingOvertimeWork", "RemainingOvertimeWork", ['class'=>'form-label']) !!} {!! Form::text("RemainingOvertimeWork", $task["RemainingOvertimeWork"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("ACWP", "ACWP", ['class'=>'form-label']) !!} {!! Form::text("ACWP", $task["ACWP"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("CV", "CV", ['class'=>'form-label']) !!} {!! Form::text("CV", $task["CV"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("ConstraintType", "ConstraintType", ['class'=>'form-label']) !!} {!! Form::text("ConstraintType", $task["ConstraintType"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("CalendarUID", "CalendarUID", ['class'=>'form-label']) !!} {!! Form::text("CalendarUID", $task["CalendarUID"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("LevelAssignments", "LevelAssignments", ['class'=>'form-label']) !!} {!! Form::text("LevelAssignments", $task["LevelAssignments"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("LevelingCanSplit", "LevelingCanSplit", ['class'=>'form-label']) !!} {!! Form::text("LevelingCanSplit", $task["LevelingCanSplit"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("LevelingDelay", "LevelingDelay", ['class'=>'form-label']) !!} {!! Form::text("LevelingDelay", $task["LevelingDelay"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("LevelingDelayFormat", "LevelingDelayFormat", ['class'=>'form-label']) !!} {!! Form::text("LevelingDelayFormat", $task["LevelingDelayFormat"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("IgnoreResourceCalendar", "IgnoreResourceCalendar", ['class'=>'form-label']) !!} {!! Form::text("IgnoreResourceCalendar", $task["IgnoreResourceCalendar"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("HideBar", "HideBar", ['class'=>'form-label']) !!} {!! Form::text("HideBar", $task["HideBar"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("Rollup", "Rollup", ['class'=>'form-label']) !!} {!! Form::text("Rollup", $task["Rollup"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("BCWS", "BCWS", ['class'=>'form-label']) !!} {!! Form::text("BCWS", $task["BCWS"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("BCWP", "BCWP", ['class'=>'form-label']) !!} {!! Form::text("BCWP", $task["BCWP"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("PhysicalPercentComplete", "PhysicalPercentComplete", ['class'=>'form-label']) !!} {!! Form::text("PhysicalPercentComplete", $task["PhysicalPercentComplete"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("EarnedValueMethod", "EarnedValueMethod", ['class'=>'form-label']) !!} {!! Form::text("EarnedValueMethod", $task["EarnedValueMethod"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-4">--}}
                                        {{--<div class="form-group">{!! Form::label("IsPublished", "IsPublished", ['class'=>'form-label']) !!} {!! Form::text("IsPublished", $task["IsPublished"],['class'=>'form-control']) !!} </div>--}}
                                    {{--</div>--}}

                                {{--@empty--}}

                                {{--@endforelse--}}
                            </div>
                            <div class="tab-pane fade" id="resource-pills">

                                Recursos Alocados
                            </div>
                            <div class="tab-pane fade" id="import-pills">

                                {!! Form::hidden("project[company]", $company->id) !!}
                                {!! Form::hidden('filepath', $import->file) !!}
                                {!! Form::hidden('id', $import->id) !!}
                                <div class="col-md-12">
                                    <div class="form-group">
                                    {!! Form::submit('Importar', ['class'=>'btn btn-success btn-block']) !!}

                                    </div>
                                </div>

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    <!-- /.card-block -->
                </div>
                <!-- /.card -->
            </div>
        </section>
    </article>

@endsection

@section('page_scripts')

@endsection