<?php namespace Forms;

use User;
use Input;
use Validator;
use Hash;

	class UserForgotUsername extends Base {

		protected $user;

		protected $rules = array(
			'email'=>'required|email',
			'password'=>'required|validUser',
		);

		protected $messages = array(
			'email.required'=>'The Email field is required',
			'password.required'=>'The Password field is required',
			'password.valid_user'=>'Incorrect Information'
		);

		public function __construct()
		{
			$this->input = Input::except('_token');

			$this->user = new User;

			Validator::extend('valid_user', function($attribute, $value, $parameters) {
				
				$email = Input::get('email');
				$password = $value;

				$this->user = User::where('email', $email)->first();

				if ($this->user)
				{

					if (Hash::check($password, $this->user->getPassword()))
					{
						return true;
					}
				}

				return false;

			});
		}

		public function process()
		{
			if (!$this->validate())
			{
				// Failure
				return false;
			}

			// Send Validation Email

			// Create User :)
			return $this->user;
		}

	}

?>