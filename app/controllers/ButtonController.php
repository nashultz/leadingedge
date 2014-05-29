<?php

	class ButtonController extends BaseController {

		public function postPerfectHome()
		{
			$form = new Forms\PerfectHome();

			if (!$user = $form->process())
			{
				if (Request::ajax())
				{
					$data['error'] = true;
					$data['errorMsg'] = $form->getError();
					return Response::json($data);
				}

				Session::flash('notification', $form->getError());
				return Redirect::to('/')->withInput();
			}

			if (Request::ajax())
			{
				$data['error'] = false;
				$data['message'] = 'Your submission has been received';
				return Response::json($data);
			}

			Session::flash('notification', 'Success!');
			return Redirect::to('/');
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