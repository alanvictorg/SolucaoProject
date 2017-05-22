<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasklinksTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasklinks', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('task_id')->unsigned()->nullable()->default(null);
            $table->foreign('task_id')->references('id')->on('tasks');
            $table->integer('PredecessorUID');
            $table->string('CrossProject');
            $table->string('LinkLag');
            $table->string('LagFormat');
            $table->integer('source');
            $table->integer('target');
            $table->string('type');
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
		Schema::drop('tasklinks');
	}

}
