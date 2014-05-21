<?php

	class UserTableSeeder extends DatabaseSeeder {

		public function run()
		{
			// Create Admin Account
			User::create(array(
				'email'=>'RomanL@SystemsEdgeOnline.com',
				'username'=>'rlopez',
				'password'=>'password'
			));
		}

	}

?>