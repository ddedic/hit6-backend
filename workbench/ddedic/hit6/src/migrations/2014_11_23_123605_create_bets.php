<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBets extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bets', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('shop_id');
			$table->string('day');
			$table->string('week');
			$table->integer('event_id');
			$table->float('stake');
			$table->string('combination');
			$table->integer('win');
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
		Schema::drop('bets');
	}

}
