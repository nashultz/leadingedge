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
				return Response::json($form->getErrors(), 400);
			}

			$data['message'] = 'You submission has been received';
			return Response::json($data, 200);		
		}

	}



?>