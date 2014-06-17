<?php

	class Video extends Eloquent {

		protected $table = 'videos';

		protected $guarded = array();

		public function neighborhood()
		{
			return $this->belongsTo('Neighborhood');
		}

		// Getters
		public function getUrl()
		{
			return $this->url;
		}

		public function getNeighborhoodName()
		{
			return $this->neighborhood->name;
		}

		public function getNeighborhoodCity()
		{
			return $this->neighborhood->city;
		}

	}

?>