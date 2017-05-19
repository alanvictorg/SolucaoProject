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
            $table->string('Title')->nullable()->default(null);;
            $table->string('Author')->nullable()->default(null);;
            $table->dateTime('CreationDate')->nullable()->default(null);;
            $table->dateTime('LastSaved')->nullable()->default(null);;
            $table->dateTime('StartDate')->nullable()->default(null);;
            $table->dateTime('FinishDate')->nullable()->default(null);;
            $table->string('FYStartDate')->nullable()->default(null);;
            $table->string('CriticalSlackLimit')->nullable()->default(null);;
            $table->string('CurrencyDigits')->nullable()->default(null);;
            $table->string('CurrencySymbol')->nullable()->default(null);;
            $table->string('CurrencyCode')->nullable()->default(null);;
            $table->string('CurrencySymbolPosition')->nullable()->default(null);;
            $table->string('CalendarUID')->nullable()->default(null);;
            $table->string('BaselineCalendar')->nullable()->default(null);
            $table->time('DefaultStartTime')->nullable()->default(null);
            $table->time('DefaultFinishTime')->nullable()->default(null);
            $table->integer('MinutesPerDay')->nullable()->default(null);
            $table->integer('MinutesPerWeek')->nullable()->default(null);
            $table->integer('DaysPerMonth')->nullable()->default(null);
            $table->integer('DefaultTaskType')->nullable()->default(null);
            $table->integer('DefaultFixedCostAccrual')->nullable()->default(null);
            $table->integer('DefaultStandardRate')->nullable()->default(null);
            $table->integer('DefaultOvertimeRate')->nullable()->default(null);
            $table->integer('DurationFormat')->nullable()->default(null);
            $table->integer('WorkFormat')->nullable()->default(null);
            $table->integer('EditableActualCosts')->nullable()->default(null);
            $table->integer('HonorConstraints')->nullable()->default(null);
            $table->integer('InsertedProjectsLikeSummary')->nullable()->default(null);
            $table->integer('MultipleCriticalPaths')->nullable()->default(null);
            $table->integer('NewTasksEffortDriven')->nullable()->default(null);
            $table->integer('NewTasksEstimated')->nullable()->default(null);
            $table->integer('SplitsInProgressTasks')->nullable()->default(null);
            $table->integer('SpreadActualCost')->nullable()->default(null);
            $table->integer('SpreadPercentComplete')->nullable()->default(null);
            $table->integer('TaskUpdatesResource')->nullable()->default(null);
            $table->integer('FiscalYearStart')->nullable()->default(null);
            $table->integer('WeekStartDay')->nullable()->default(null);
            $table->integer('MoveCompletedEndsBack')->nullable()->default(null);
            $table->integer('MoveRemainingStartsBack')->nullable()->default(null);
            $table->integer('MoveRemainingStartsForward')->nullable()->default(null);
            $table->integer('MoveCompletedEndsForward')->nullable()->default(null);
            $table->integer('BaselineForEarnedValue')->nullable()->default(null);
            $table->integer('AutoAddNewResourcesAndTasks')->nullable()->default(null);
            $table->dateTime('StatusDate')->nullable()->default(null);
            $table->dateTime('CurrentDate')->nullable()->default(null);
            $table->integer('Autolink')->nullable()->default(null);
            $table->integer('NewTaskStartDate')->nullable()->default(null);
            $table->integer('NewTasksAreManual')->nullable()->default(null);
            $table->integer('DefaultTaskEVMethod')->nullable()->default(null);
            $table->integer('ProjectExternallyEdited')->nullable()->default(null);
            $table->dateTime('ExtendedCreationDate')->nullable()->default(null);
            $table->integer('ActualsInSync')->nullable()->default(null);
            $table->integer('RemoveFileProperties')->nullable()->default(null);
            $table->integer('AdminProject')->nullable()->default(null);
            $table->integer('UpdateManuallyScheduledTasksWhenEditingLinks')->nullable()->default(null);
            $table->integer('KeepTaskOnNearestWorkingTimeWhenMadeAutoScheduled')->nullable()->default(null);
            $table->string('ScheduleFromStart')->nullable()->default(null);
            $table->string('MicrosoftProjectServerURL')->nullable()->default(null);
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
