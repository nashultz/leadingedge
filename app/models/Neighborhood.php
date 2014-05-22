<?php

	class Neighborhood extends Eloquent {

		protected $table = 'neighborhoods';

		protected $guarded = array();

		public function builders()
		{
			return $this->hasMany('Builder');
		}

	}

?>