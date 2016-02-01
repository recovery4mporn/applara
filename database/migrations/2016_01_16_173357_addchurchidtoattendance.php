<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Addchurchidtoattendance extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('attendances', function(Blueprint $table)
		{
	        $table->engine = 'InnoDB';
			$table->integer('church_id')->unsigned();
		});
		Schema::table('attendances', function(Blueprint $table)
		{
	        $table->engine = 'InnoDB';
			$table->foreign('church_id')
          			->references('id')->on('churches');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
