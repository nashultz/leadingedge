<?php namespace Forms;

use User;
use Input;
use Validator;
use Mail;

	class UserRegister extends Base {

		protected $user;

		protected $rules = array(
			'fname'=>'required',
			'lname'=>'required',
			'username'=>'required|unique:users,username|validUsername',
			'password'=>'required|min:6|confirmed',
			'email'=>'required|unique:users,email|email'
		);

		protected $messages = array(
			'fname.required'=>'The First Name field is required.',
			'lname.required'=>'The Last name field is required.',
			'username.valid_username'=>'Username can only contain A-Z, 0-9 and _',
			'username.unique'=>'Username is already in use.',
			'email.unique'=>'Email is already in use.'
		);

		public function __construct()
		{
			parent::__construct();

			$this->input = Input::except('_token');

			$this->user = new User;

			Validator::extend('valid_username', function($attribute, $value, $parameters) {
				return preg_match("/^[a-zA-Z0-9]+$/", $value);
			});
		}

		public function process()
		{
			if (!$this->validate())
			{
				// Failure
				return false;
			}

			$user = $this->user->create(Input::except('_token','password_confirmation'));

			// Send Validation Email
			$mail = Mail::send(array('emails.html.auth.register', 'emails.text.auth.register'), array('user'=>$user), function($message) use ($user) {
				
				$message->to($user->getEmail());

				$message->subject('Confirm Sign Up for Leading Edge Realty');


			});

			Mail::send(array('emails.html.auth.newuser','emails.text.auth.newuser'),array('user'=>$user),function($message) use ($user) {
				$message->to('leadingedgerealtyaustin@gmail.com');
				$message->subject('New User Has Signed Up');
			});

			if (!$mail)
			{
				$this->validationErrors->add('failedEmail', 'There was a problem with the Email System. Please Contact the System Administrator.');
				return false;
			}

			// Create User :)
			return $user;
		}

	}

?>