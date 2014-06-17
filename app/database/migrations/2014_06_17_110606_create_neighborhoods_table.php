<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNeighborhoodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('neighborhoods', function($table) {

			$table->increments('id');

			$table->string('name');

			$table->string('slug');
			$table->string('city');

			$table->string('isd');
			$table->string('district');

			$table->decimal('latitude', 18, 15)->nullable();
			$table->decimal('longitude', 18, 15)->nullable();

			$table->string('playlist');

			$table->timestamps();
			$table->softDeletes();

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
		Schema::drop('neighborhoods');
	}

}
