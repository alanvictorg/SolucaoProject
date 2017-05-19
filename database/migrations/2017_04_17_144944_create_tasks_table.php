<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks', function(Blueprint $table) {
            $table->increments('id');
            $table->string('parent')->nullable()->default(null);
            $table->bigInteger('UID');
            $table->integer('CalendarUID');
            $table->integer('project_id')->unsigned();
            $table->foreign('project_id')->references('id')->on('projects');
            $table->string('Name')->nullable()->default(null);
            $table->integer('Active');
            $table->integer('Manual');
            $table->integer('Type');
            $table->integer('IsNull');
            $table->dateTime('CreateDate');
            $table->string('WBS')->nullable()->default(null);
            $table->string('OutlineNumber')->nullable()->default(null);
            $table->integer('OutlineLevel')->nullable()->default(null);
            $table->integer('Priority')->nullable()->default(null);
            $table->dateTime('Start')->nullable()->default(null);
            $table->dateTime('Finish')->nullable()->default(null);
            $table->string('Duration');
            $table->dateTime('ManualStart')->nullable()->default(null);
            $table->dateTime('ManualFinish')->nullable()->default(null);
            $table->string('ManualDuration')->nullable()->default(null);
            $table->integer('DurationFormat')->nullable()->default(null);
            $table->string('Work')->nullable()->default(null);
            $table->dateTime('Stop')->nullable()->default(null);
            $table->dateTime('Resume')->nullable()->default(null);
            $table->integer('ResumeValid')->nullable()->default(null);
            $table->integer('EffortDriven')->nullable()->default(null);
            $table->integer('Recurring')->nullable()->default(null);
            $table->integer('OverAllocated')->nullable()->default(null);
            $table->integer('Estimated')->nullable()->default(null);
            $table->integer('Milestone')->nullable()->default(null);
            $table->integer('Summary')->nullable()->default(null);
            $table->integer('DisplayAsSummary')->nullable()->default(null);
            $table->integer('Critical')->nullable()->default(null);
            $table->integer('IsSubproject')->nullable()->default(null);
            $table->integer('IsSubprojectReadOnly')->nullable()->default(null);
            $table->integer('ExternalTask')->nullable()->default(null);
            $table->dateTime('EarlyStart')->nullable()->default(null);
            $table->dateTime('EarlyFinish')->nullable()->default(null);
            $table->dateTime('LateStart')->nullable()->default(null);
            $table->dateTime('LateFinish')->nullable()->default(null);
            $table->integer('StartVariance')->nullable()->default(null);
            $table->bigInteger('FinishVariance')->nullable()->default(null);
            $table->double('WorkVariance')->nullable()->default(null);
            $table->integer('FreeSlack')->nullable()->default(null);
            $table->integer('TotalSlack')->nullable()->default(null);
            $table->integer('StartSlack')->nullable()->default(null);
            $table->integer('FinishSlack')->nullable()->default(null);
            $table->integer('FixedCost')->nullable()->default(null);
            $table->integer('FixedCostAccrual')->nullable()->default(null);
            $table->float('PercentComplete')->nullable()->default(null);
            $table->float('PercentWorkComplete')->nullable()->default(null);
            $table->double('Cost')->nullable()->default(null);
            $table->integer('OvertimeCost')->nullable()->default(null);
            $table->string('OvertimeWork')->nullable()->default(null);
            $table->dateTime('ActualStart')->nullable()->default(null);
            $table->dateTime('ActualFinish')->nullable()->default(null);
            $table->string('ActualDuration')->nullable()->default(null);
            $table->double('ActualCost')->nullable()->default(null);
            $table->integer('ActualOvertimeCost')->nullable()->default(null);
            $table->string('ActualWork')->nullable()->default(null);
            $table->string('ActualOvertimeWork')->nullable()->default(null);
            $table->string('RegularWork')->nullable()->default(null);
            $table->string('RemainingDuration')->nullable()->default(null);
            $table->double('RemainingCost')->nullable()->default(null);
            $table->string('RemainingWork')->nullable()->default(null);
            $table->integer('RemainingOvertimeCost')->nullable()->default(null);
            $table->string('RemainingOvertimeWork')->nullable()->default(null);
            $table->double('ACWP')->nullable()->default(null);
            $table->double('CV')->nullable()->default(null);
            $table->integer('ConstraintType')->nullable()->default(null);
            $table->integer('LevelAssignments')->nullable()->default(null);
            $table->integer('LevelingCanSplit')->nullable()->default(null);
            $table->integer('LevelingDelay')->nullable()->default(null);
            $table->integer('LevelingDelayFormat')->nullable()->default(null);
            $table->integer('IgnoreResourceCalendar')->nullable()->default(null);
            $table->integer('HideBar')->nullable()->default(null);
            $table->integer('Rollup')->nullable()->default(null);
            $table->double('BCWS')->nullable()->default(null);
            $table->double('BCWP')->nullable()->default(null);
            $table->double('PhysicalPercentComplete')->nullable()->default(null);
            $table->integer('EarnedValueMethod')->nullable()->default(null);
            $table->integer('IsPublished')->nullable()->default(null);
            $table->integer('CommitmentType')->nullable()->default(null);
            $table->string('TimephasedData')->nullable()->default(null);
            $table->string('Baseline')->nullable()->default(null);
            $table->string('ExtendedAttribute')->nullable()->default(null);
            $table->integer('PredecessorLink')->nullable()->default(null);
            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tasks');
	}

}
