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

		public function getNeighborhoodSlug()
		{
			return $this->neighborhood->slug;
		}

		public function getNeighborhoodCity()
		{
			return $this->neighborhood->city;
		}

		public function getNeighborhoodISD()
		{
			return $this->neighborhood->district . ' ISD';
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

		public function getAvgMinPrice()
		{
			return '$' . number_format($this->neighborhood->builders()->avg('min_price'), 2);
		}

		public function getAvgMaxPrice()
		{
			return '$' . number_format($this->neighborhood->builders()->avg('max_price'), 2);
		}

		public function getAvgMinSqFootage()
		{
			return number_format($this->neighborhood->builders()->avg('min_size'));
		}

		public function getAvgMaxSqFootage()
		{
			return number_format($this->neighborhood->builders()->avg('max_size'));
		}

	}

?>