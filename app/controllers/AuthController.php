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
				Session::flash('notification', 'Invalid Login');
				return Redirect::route('get.auth.login');
			}

			if (Auth::user()->confirmation_code)
			{
				Auth::logout();
				Session::flash('notification', 'You have not confirmed your account');
				return Redirect::route('get.auth.login');
			}

			// Login Success
			return Redirect::to('/');
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
				Session::flash('notification', $form->getError());
				return Redirect::route('get.auth.login')->withInput();
			}

			Session::flash('notification', 'Success!');
			return Redirect::route('get.auth.login');
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
				Session::flash('notification', $form->getError());
				return Redirect::route('get.auth.forgot.email');
			}

			Session::flash('notification', 'Your E-Mail is: ' . $user->getEmail());
			return Redirect::route('get.auth.forgot.email');
		}

		public function getForgotUsername()
		{
			return View::make('auth.forgot_username');
		}

		public function postForgotUsername()
		{
			$form = new Forms\UserForgotUsername();

			if (!$user = $form->process())
			{
				Session::flash('notification', $form->getError());
				return Redirect::route('get.auth.forgot.username');
			}

			Session::flash('notification', 'Your Username is: ' . $user->getUsername());
			return Redirect::route('get.auth.login');
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
					$user->save();

					Session::flash('notification', 'Your account has been confirmed');
					return Redirect::route('get.auth.login');
				}
				
				Session::flash('notification', 'Your account has exceeded the Expiration Time. Please check your email for a new Confirmation Code');
				$user->confirmation_code = Crypt::encrypt($user->email);
				$user->confirmation_expire_date = $now->addHours(2);
				$user->save();

				return Redirect::route('get.auth.login');
			}

			Session::flash('notification', 'Invalid Confirmation Code');
			return Redirect::route('get.auth.login');
		}

		public function getLogout()
		{
			Auth::logout();
        	return Redirect::route('get.auth.login');
		}

	}

?>