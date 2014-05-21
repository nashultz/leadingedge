<?php

	Class Errors {

		private $_title = null;
		private $_message = null;
		private $_titles = array(
			'Ruh Roh Raggy',
			'Doh',
			'Stupid is as Stupid Does',
			'Houston, we have a problem',
			'Dude... Seriously?'
		);		

		function __construct() {
			$titleIndex = rand(0,count($this->_titles)-1);
			$this->_title = $this->_titles[$titleIndex];
		}

		function message($message) {
			$this->_message = $message;
		}

		function title($title) {
			$this->_title = $title;
		}

		function show() {
			return View::make('errors.general')
				->with('title',$this->_title)
				->with('message',$this->_message);
		}
	}

?>