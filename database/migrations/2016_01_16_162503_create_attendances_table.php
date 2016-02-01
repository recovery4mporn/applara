<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('attendances', function(Blueprint $table)
		{
	        $table->engine = 'InnoDB';
	        $table->increments('id');
			$table->string('name');
			$table->string('description');
			$table->date('date');
			$table->timestamps();
		});
		Schema::create('attendances_users', function(Blueprint $table)
		{
	        $table->engine = 'InnoDB';
			$table->integer('attendance_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->boolean('attended');
		});
		Schema::table('attendances_users', function(Blueprint $table)
		{
        	$table->foreign('attendance_id')
          			->references('id')->on('attendances');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('attendances');
		Schema::drop('attendances_users');
	}

}
