<?php

	class Builder extends Eloquent {

		protected $table = 'builders';

		protected $guarded = array();

		public function neighborhood()
		{
			return $this->belongsTo('Neighborhood');
		}

		// Getters
		public function getName()
		{
			return $this->name;
		}

		public function getNeighborhoodName()
		{
			return $this->neighborhood->name;
		}

		public function getNeighborhoodCity()
		{
			return $this->neighborhood->city;
		}

		public function getMinPrice()
		{
			return '$' . number_format($this->min_price, 2);
		}

		public function getMaxPrice()
		{
			return '$' . number_format($this->max_price, 2);
		}

		public function getMinSqFootage()
		{
			return number_format($this->min_size);
		}

		public function getMaxSqFootage()
		{
			return number_format($this->max_size);
		}

	}

?>