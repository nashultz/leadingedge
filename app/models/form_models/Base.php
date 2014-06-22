<?php namespace Forms;

use \Illuminate\Support\MessageBag;
use Validator;
use Response;

	class Base {

		protected $input = array();
		protected $rules = array();
		protected $messages = array();
		protected $validationErrors = array();
		protected $validator;

		public function __construct()
		{
			$this->validationErrors = new \Illuminate\Support\MessageBag;
		}

		//protected $validationErrors = \Illuminate\Support\MessageBag;

		public function validate()
		{
			$this->validator = Validator::make($this->input, $this->rules, $this->messages);
			return !$this->validator->fails();
		}

		public function getError()
		{
			return $this->validationErrors->first();
		}

		public function getErrors()
		{
			$messages = $this->validator->messages();
            foreach($messages->toArray() as $key=>$value)
            {
                $data['message'][] = $value;
                $data['field'][] = $key;
            }
            return $data;
		}

	}

?>