<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEvents extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table)
		{
			$table->increments('id');
            $table->timestamps();

			$table->string('day');
			$table->string('week');

            $table->integer('shop_id');
			$table->integer('event_raw');

			$table->string('combined', 1000);
			$table->string('sorted', 1000);

			$table->integer('b1');
			$table->integer('b2');
			$table->integer('b3');
			$table->integer('b4');
			$table->integer('b5');
			$table->integer('b6');
			$table->integer('b7');
			$table->integer('b8');
			$table->integer('b9');
			$table->integer('b10');
			$table->integer('b11');
			$table->integer('b12');
			$table->integer('b13');
			$table->integer('b14');
			$table->integer('b15');
			$table->integer('b16');
			$table->integer('b17');
			$table->integer('b18');
			$table->integer('b19');
			$table->integer('b20');
			$table->integer('b21');
			$table->integer('b22');
			$table->integer('b23');
			$table->integer('b24');
			$table->integer('b25');
			$table->integer('b26');
			$table->integer('b27');
			$table->integer('b28');
			$table->integer('b29');
			$table->integer('b30');
			$table->integer('b31');
			$table->integer('b32');
			$table->integer('b33');
			$table->integer('b34');
			$table->integer('b35');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('events');
	}

}
