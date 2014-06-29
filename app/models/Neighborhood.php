<?php

	class Neighborhood extends Eloquent {

		protected $table = 'neighborhoods';

		protected $guarded = array();

		public function builders()
		{
			return $this->hasMany('Builder');
		}

		public function videos()
		{
			return $this->hasMany('Video');
		}

		public function getName()
		{
			return $this->name;
		}

		public function count()
		{
			return $this->count();
		}

	}

?>