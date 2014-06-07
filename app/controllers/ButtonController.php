<?php

	class ButtonController extends BaseController {

		public function postPerfectHome()
		{
			$form = new Forms\PerfectHome();

			if (!$form->process())
			{
				if (Request::ajax())
				{
					$data['error'] = true;
					$data['errorMsg'] = $form->getError();
					return Response::json($data);
				}

			}

			if (Request::ajax())
			{
				$data['error'] = false;
				$data['message'] = 'Your submission has been received';
				return Response::json($data);
			}

		}

		public function postNewAustin()
		{
			$form = new Forms\NewAustin();

			if (!$form->process())
			{
				if (Request::ajax())
				{
					$data['error'] = true;
					$data['errorMsg'] = $form->getError();
					return Response::json($data);
				}
			}

			if (Request::ajax())
			{
				$data['error'] = false;
				$data['message'] = 'You submission has been received';
				return Response::json($data);
			}

		}

		public function postSellHome()
		{

		}

		public function postAffordHome()
		{

		}

	}



?>