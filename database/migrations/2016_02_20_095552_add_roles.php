<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Bican\Roles\Models\Role;
class AddRoles extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Role::create([
			'name' => 'Pastor',
			'slug' => 'pastor',
			]);
		Role::create([
			'name' => 'Zone Leader',
			'slug' => 'zone.leader',
			]);
		Role::create([
			'name' => 'Volunteer',
			'slug' => 'volunteer',
			]);

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
