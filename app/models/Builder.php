<?php

	class Builder extends Eloquent {

		protected $table = 'builders';

		protected $guarded = array();

		public function neighborhood()
		{
			return $this->belongsTo('Neighborhood');
		}

		// Getters
		public function getBuilderName()
		{
			return $this->name;
		}

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

		public function getNeighborhoodCount()
		{
			return $this->neighborhood->count();
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

		public function getMinMinPrice()
		{
			return '$' . number_format($this->neighborhood->builders()->min('min_price'));
		}

		public function getMaxMaxPrice()
		{
			return '$' . number_format($this->neighborhood->builders()->max('max_price'));
		}

		public function getMinMinSqFootage()
		{
			return number_format($this->neighborhood->builders()->min('min_size'));
		}

		public function getMaxMaxSqFootage()
		{
			return number_format($this->neighborhood->builders()->max('max_size'));
		}

	}

?>