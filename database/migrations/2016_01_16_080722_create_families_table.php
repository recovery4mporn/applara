<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamiliesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('families', function(Blueprint $table)
		{
	        $table->engine = 'InnoDB';
			$table->increments('id');
			$table->string('name');
			$table->string('description');
			$table->timestamps();
		});

		Schema::table('users', function(Blueprint $table)
		{
	        $table->engine = 'InnoDB';
			$table->integer('family_id')->unsigned()->nullable();
		});

		Schema::table('users', function(Blueprint $table)
		{
	        $table->engine = 'InnoDB';
        	$table->foreign('family_id')
          			->references('id')->on('families');

		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('families');
	}

}
