<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('organizationName');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('contactPerson1');
            $table->string('mobileContact1');
            $table->string('contactPerson2');
            $table->string('mobileContact2');
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
		Schema::drop('clients');
	}

}
