<?php

	class ButtonController extends BaseController {

		public function postPerfectHome()
		{
			$form = new Forms\PerfectHome();

			if (!$user = $form->process())
			{
				Session::flash('notification', $form->getError());
				return Redirect::route('get.auth.login')->withInput();
			}

			Session::flash('notification', 'Success!');
			return Redirect::route('get.auth.login');
		}

		public function postNewAustin()
		{

		}

		public function postSellHome()
		{

		}

		public function postAffordHome()
		{

		}

	}



?>