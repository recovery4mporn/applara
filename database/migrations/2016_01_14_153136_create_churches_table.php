<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChurchesTable extends Migration {

  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {

    Schema::create('churches', function(Blueprint $table)
    {
      $table->engine = 'InnoDB';
      $table->increments('id');
      $table->string('name');
      $table->text('address');
      $table->integer('initiator_id')->unsigned();
      $table->boolean('approved')->default(false);
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
    Schema::drop('churches');
  }

}
