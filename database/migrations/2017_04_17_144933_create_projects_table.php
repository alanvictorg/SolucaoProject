<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->string('Title');
            $table->string('Author');
            $table->dateTime('CreationDate');
            $table->dateTime('LastSaved');
            $table->dateTime('StartDate');
            $table->dateTime('FinishDate');
            $table->string('FYStartDate');
            $table->string('CriticalSlackLimit');
            $table->string('CurrencyDigits');
            $table->string('CurrencySymbol');
            $table->string('CurrencyCode');
            $table->string('CurrencySymbolPosition');
            $table->string('CalendarUID');
            $table->string('BaselineCalendar');
            $table->time('DefaultStartTime');
            $table->time('DefaultFinishTime');
            $table->integer('MinutesPerDay');
            $table->integer('MinutesPerWeek');
            $table->integer('DaysPerMonth');
            $table->integer('DefaultTaskType');
            $table->integer('DefaultFixedCostAccrual');
            $table->integer('DefaultStandardRate');
            $table->integer('DefaultOvertimeRate');
            $table->integer('DurationFormat');
            $table->integer('WorkFormat');
            $table->integer('EditableActualCosts');
            $table->integer('HonorConstraints');
            $table->integer('InsertedProjectsLikeSummary');
            $table->integer('MultipleCriticalPaths');
            $table->integer('NewTasksEffortDriven');
            $table->integer('NewTasksEstimated');
            $table->integer('SplitsInProgressTasks');
            $table->integer('SpreadActualCost');
            $table->integer('SpreadPercentComplete');
            $table->integer('TaskUpdatesResource');
            $table->integer('FiscalYearStart');
            $table->integer('WeekStartDay');
            $table->integer('MoveCompletedEndsBack');
            $table->integer('MoveRemainingStartsBack');
            $table->integer('MoveRemainingStartsForward');
            $table->integer('MoveCompletedEndsForward');
            $table->integer('BaselineForEarnedValue');
            $table->integer('AutoAddNewResourcesAndTasks');
            $table->dateTime('StatusDate');
            $table->dateTime('CurrentDate');
            $table->integer('Autolink');
            $table->integer('NewTaskStartDate');
            $table->integer('NewTasksAreManual');
            $table->integer('DefaultTaskEVMethod');
            $table->integer('ProjectExternallyEdited');
            $table->dateTime('ExtendedCreationDate');
            $table->integer('ActualsInSync');
            $table->integer('RemoveFileProperties');
            $table->integer('AdminProject');
            $table->integer('UpdateManuallyScheduledTasksWhenEditingLinks');
            $table->integer('KeepTaskOnNearestWorkingTimeWhenMadeAutoScheduled');
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
		Schema::drop('projects');
	}

}
