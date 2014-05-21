<?php namespace Forms;

use User;
use Input;
use Validator;
use Hash;

	class UserForgotEmail extends Base {

		protected $user;

		protected $rules = array(
			'username'=>'required',
			'password'=>'required|validUser',
		);

		protected $messages = array(
			'username.required'=>'The Username field is required',
			'password.required'=>'The Password field is required',
			'password.valid_user'=>'Incorrect Information'
		);

		public function __construct()
		{
			parent::__construct();

			$this->input = Input::except('_token');

			$this->user = new User;

			Validator::extend('valid_user', function($attribute, $value, $parameters) {
				$username = Input::get('username');
				$password = $value;

				$this->user = User::where('username', $username)->first();

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