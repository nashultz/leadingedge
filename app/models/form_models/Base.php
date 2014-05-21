<?php namespace Forms;

use \Illuminate\Support\MessageBag;
use Validator;

	class Base {

		protected $input = array();
		protected $rules = array();
		protected $messages = array();
		protected $validationErrors = array();

		public function __construct()
		{
			$this->validationErrors = new \Illuminate\Support\MessageBag;
		}

		//protected $validationErrors = \Illuminate\Support\MessageBag;

		public function validate()
		{
			$validator = Validator::make($this->input, $this->rules, $this->messages);
			if ($validator->fails())
			{
				$this->validationErrors = $validator->messages();
			}

			return !$validator->fails();
		}

		public function getError()
		{
			return $this->validationErrors->first();
		}

	}

?>