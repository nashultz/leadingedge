<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('builders', function($table) {

			$table->increments('id');

			$table->integer('neighborhood_id');

			$table->string('name');
			$table->string('slug');

			$table->integer('min_price')->nullable();
			$table->integer('max_price')->nullable();

			$table->integer('min_size')->nullable();
			$table->integer('max_size')->nullable();

			$table->string('website')->nullable();
			$table->string('agent')->nullable();
			$table->string('phone')->nullable();

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
		Schema::drop('builders');
	}

}
