<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddChurchIdToUsersTable extends Migration {

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
        $table->engine = 'InnoDB';
        $table->foreign('church_id')
          ->references('id')->on('churches')
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
        //
      // Schema::table('users', function(Blueprint $table)
      // {
      //   $table->dropForeign('users_churches_church_id');
      // });
    }

}
