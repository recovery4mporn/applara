<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Addfieldstouserstable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
	    Schema::table('users', function(Blueprint $table)
    	  {
    	  	$table->boolean('baptism_taken')->default(false);
    	  	$table->boolean('annointing_taken')->default(false);
    	  	$table->boolean('married')->default(false);
    	  	$table->string('image_url');
    	  	$table->string('job');
    	  	$table->string('address');
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
