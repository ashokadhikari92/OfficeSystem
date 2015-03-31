<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIssueBugsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('issue_bugs', function(Blueprint $table)
		{
			$table->increments('id');
            $table->integer('projectId')->unsigned();
            $table->foreign('projectId')->references('projId')->on('projects')->onDelete('cascade');
            $table->string('title');
            $table->string('description');
            $table->integer('observedBy')->unsigned();
            $table->foreign('observedBy')->references('id')->on('users')->onDelete('cascade');
            $table->date('observedDate');
            $table->string('status');
            $table->integer('solvedBy')->unsigned();
            $table->foreign('solvedBy');
            $table->string('remarks');
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
		Schema::drop('issue_bugs');
	}

}
