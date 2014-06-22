<?php

use Carbon\Carbon;

	class AuthController extends BaseController {

		public function getLogin()
		{
			return View::make('auth.login-register');
		}

		public function postLogin()
		{
			$user = Input::get('user');
			$creds['password'] = Input::get('password');
			$remember = Input::get('remember');
			
			if (strpos($user, '@') !== false)
			{
				// Check via Email
				$creds['email'] = $user;
			}
			else {
				// Check via User
				$creds['username'] = $user;
			}

			if (!Auth::attempt($creds,$remember))
			{
				// Login Failure
				$data['field'] = array('user', 'password');
				$data['message'] = "Invalid Login";
				
				return Response::json($data, 400);
			}

			if (Auth::user()->confirmation_code)
			{
				Auth::logout();
				$data['message'] = 'You have not confirmed your account';
				return Response::json($data, 400);
			}

			// Login Success
			$data['message'] = 'You have logged in! You will be redirected.';
			$data['redirectUrl'] = URL::to('/');
			return Response::json($data, 200);
		}

		public function getRegister()
		{
			return View::make('auth.register');
		}	

		public function postRegister()
		{
			$form = new Forms\UserRegister();

			if (!$user = $form->process())
			{
				return Response::json($form->getErrors(), 400);
			}

			$data['message']= 'Please check your email for your verification code!';
			return Response::json($data, 200);
		}

		public function getForgotEmail()
		{	
			return View::make('auth.forgot_email');
		}

		public function postForgotEmail()
		{
			$form = new Forms\UserForgotEmail();

			if (!$user = $form->process())
			{
				Notifications::danger($form->getError())->save();
				return Redirect::route('get.auth.forgot.email');
			}

			Notifications::info('Your E-Mail is: ' . $user->getEmail())->save();
			return Redirect::route('get.auth.forgot.email');
		}

		public function getForgotPassword()
		{
			return View::make('auth.forgot_password');
		}

		public function postForgotPassword()
		{

		}

		public function getConfirmation($user, $code)
		{
			if ($code == $user->confirmation_code)
			{
				$now = Carbon::now();
				if ($now->lt($user->confirmation_expire_date))
				{
					$user->confirmation_code = null;
					$user->confirmation_expire_date = null;
					$user->update();

					Notifications::success('Your account has been confirmed')->save();
					return Redirect::route('get.auth.login');
				}
				
				Notifications::warning('Your account has exceeded the Expiration Time. Please check your email for a new Confirmation Code')->save();
				$user->confirmation_code = Crypt::encrypt($user->email);
				$user->confirmation_expire_date = $now->addHours(2);
				$user->update();

				return Redirect::route('get.auth.login');
			}

			Notifications::danger('Invalid Confirmation Code')->save();
			return Redirect::route('get.auth.login');
		}

		public function getLogout()
		{
			Auth::logout();
        	return Redirect::route('get.auth.login');
		}

	}

?>