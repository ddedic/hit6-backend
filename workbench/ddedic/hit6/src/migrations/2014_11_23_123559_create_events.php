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

            $table->string('year');
            $table->string('month');
			$table->string('week');
            $table->string('day');

            $table->integer('shop_id');
			$table->integer('event_raw');

			$table->text('combined');
			$table->text('sorted');

            $table->dateTime('started_at');
            $table->tinyInteger('finished')->default(0);
            $table->dateTime('finished_at');


            $table->tinyInteger('b1');
			$table->tinyInteger('b2');
			$table->tinyInteger('b3');
			$table->tinyInteger('b4');
			$table->tinyInteger('b5');
			$table->tinyInteger('b6');
			$table->tinyInteger('b7');
			$table->tinyInteger('b8');
			$table->tinyInteger('b9');
			$table->tinyInteger('b10');
			$table->tinyInteger('b11');
			$table->tinyInteger('b12');
			$table->tinyInteger('b13');
			$table->tinyInteger('b14');
			$table->tinyInteger('b15');
			$table->tinyInteger('b16');
			$table->tinyInteger('b17');
			$table->tinyInteger('b18');
			$table->tinyInteger('b19');
			$table->tinyInteger('b20');
			$table->tinyInteger('b21');
			$table->tinyInteger('b22');
			$table->tinyInteger('b23');
			$table->tinyInteger('b24');
			$table->tinyInteger('b25');
			$table->tinyInteger('b26');
			$table->tinyInteger('b27');
			$table->tinyInteger('b28');
			$table->tinyInteger('b29');
			$table->tinyInteger('b30');
			$table->tinyInteger('b31');
			$table->tinyInteger('b32');
			$table->tinyInteger('b33');
			$table->tinyInteger('b34');
			$table->tinyInteger('b35');
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
