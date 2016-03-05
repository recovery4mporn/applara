<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZonesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

    Schema::create('zones', function(Blueprint $table)
    {
      $table->engine = 'InnoDB';
      $table->increments('id');
      $table->integer('church_id')->unsigned();
      $table->string('name');
      $table->string('description');
  	});

    Schema::table('zones', function(Blueprint $table)
    {
      $table->engine = 'InnoDB';
      $table->foreign('church_id')
          ->references('id')->on('churches')
          ->onDelete('cascade');
  	});

  	Schema::table('users', function(Blueprint $table)
    {
    	$table->integer('zone_id')->unsigned()->nullable();
    });
    Schema::table('users', function(Blueprint $table)
    {
    	$table->foreign('zone_id')
          ->references('id')->on('zones')
          ->onDelete('cascade');
    });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('zones');
	}

}
