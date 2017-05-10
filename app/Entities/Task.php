<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Task extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        "project_id",
        "UID",
        "Name",
        "Active",
        "Manual",
        "Type",
        "IsNull",
        "CreateDate",
        "WBS",
        "OutlineNumber",
        "OutlineLevel",
        "Priority",
        "Start",
        "Finish",
        "Duration",
        "ManualStart",
        "ManualFinish",
        "ManualDuration",
        "DurationFormat",
        "Work",
        "ResumeValid",
        "EffortDriven",
        "Recurring",
        "OverAllocated",
        "Estimated",
        "Milestone",
        "Summary",
        "DisplayAsSummary",
        "Critical",
        "IsSubproject",
        "IsSubprojectReadOnly",
        "ExternalTask",
        "EarlyStart",
        "EarlyFinish",
        "LateStart",
        "LateFinish",
        "StartVariance",
        "FinishVariance",
        "WorkVariance",
        "FreeSlack",
        "TotalSlack",
        "StartSlack",
        "FinishSlack",
        "FixedCost",
        "FixedCostAccrual",
        "PercentComplete",
        "PercentWorkComplete",
        "Cost",
        "OvertimeCost",
        "OvertimeWork",
        "ActualDuration",
        "ActualCost",
        "ActualOvertimeCost",
        "ActualWork",
        "ActualOvertimeWork",
        "RegularWork",
        "RemainingDuration",
        "RemainingCost",
        "RemainingWork",
        "RemainingOvertimeCost",
        "RemainingOvertimeWork",
        "ACWP",
        "CV",
        "ConstraintType",
        "CalendarUID",
        "LevelAssignments",
        "LevelingCanSplit",
        "LevelingDelay",
        "LevelingDelayFormat",
        "IgnoreResourceCalendar",
        "HideBar",
        "Rollup",
        "BCWS",
        "BCWP",
        "PhysicalPercentComplete",
        "EarnedValueMethod",
        "IsPublished",
        "CommitmentType",
        "IsPublished",
//        "PredecessorLink",
//        "CommitmentType",
//        "ExtendedAttribute",
//        "Baseline",
//        "TimephasedData"
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
