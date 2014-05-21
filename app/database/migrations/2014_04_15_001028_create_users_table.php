<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('users', function($table) {

			$table->increments('id');

			$table->string('email');

			$table->string('username');
			$table->string('password');

			$table->string('fname');
			$table->string('lname');

			$table->string('confirmation_code', 500)->nullable();
			$table->timestamp('confirmation_expire_date')->nullable();

			$table->string('password_reset_confirmation_code')->nullable();

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
		Schema::drop('users');
	}

}
