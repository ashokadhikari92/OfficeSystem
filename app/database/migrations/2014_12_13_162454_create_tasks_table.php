<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->integer('projectId')->unsigned();
            $table->foreign('projectId')->references('projId')->on('projects')->onDelete('cascade');
            $table->integer('taskCategoryId')->unsigned();
            $table->foreign('taskCategoryId')->references('id')->on('task_categories')->onDelete('cascade');
            $table->integer('assignedTo');//User id from users table
            $table->date('assignedDate');
            $table->date('deadline');
            $table->string('status');
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
