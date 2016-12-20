<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Project extends Model implements Transformable
{
    use TransformableTrait;
    protected $dates = [
        'StartDate',
        'FinishDate',
        'StatusDate'
    ];
    protected $fillable = [
        'company_id',
        'Title',
        'Author',
        'CreationDate',
        'LastSaved',
        'StartDate',
        'FinishDate',
        'FYStartDate',
        'CriticalSlackLimit',
        'CurrencyDigits',
        'CurrencySymbol',
        'CurrencyCode',
        'CurrencySymbolPosition',
        'CalendarUID',
        'BaselineCalendar',
        'DefaultStartTime',
        'DefaultFinishTime',
        'MinutesPerDay',
        'MinutesPerWeek',
        'DaysPerMonth',
        'DefaultTaskType',
        'DefaultFixedCostAccrual',
        'DefaultStandardRate',
        'DefaultOvertimeRate',
        'DurationFormat',
        'WorkFormat',
        'EditableActualCosts',
        'HonorConstraints',
        'InsertedProjectsLikeSummary',
        'MultipleCriticalPaths',
        'NewTasksEffortDriven',
        'NewTasksEstimated',
        'SplitsInProgressTasks',
        'SpreadActualCost',
        'SpreadPercentComplete',
        'TaskUpdatesResource',
        'FiscalYearStart',
        'WeekStartDay',
        'MoveCompletedEndsBack',
        'MoveRemainingStartsBack',
        'MoveRemainingStartsForward',
        'MoveCompletedEndsForward',
        'BaselineForEarnedValue',
        'AutoAddNewResourcesAndTasks',
        'StatusDate',
        'CurrentDate',
        'Autolink',
        'NewTaskStartDate',
        'NewTasksAreManual',
        'DefaultTaskEVMethod',
        'ProjectExternallyEdited',
        'ExtendedCreationDate',
        'ActualsInSync',
        'RemoveFileProperties',
        'AdminProject',
        'UpdateManuallyScheduledTasksWhenEditingLinks',
        'KeepTaskOnNearestWorkingTimeWhenMadeAutoScheduled'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

}