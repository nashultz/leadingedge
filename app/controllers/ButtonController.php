<?php

	class ButtonController extends BaseController {

		public function postPerfectHome()
		{
			return $this->processForm(new Forms\PerfectHome());
		}

		public function postNewAustin()
		{
			return $this->processForm(new Forms\NewAustin());
		}

		public function postSellHome()
		{
			return $this->processForm(new Forms\SellHome());
		}

		public function postAffordHome()
		{
			return $this->processForm(new Forms\AffordHome());
		}

		private function processForm($form)
		{
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

	}



?>