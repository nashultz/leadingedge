<?php

	class Builder extends Eloquent {

		protected $table = 'builders';

		protected $guarded = array();

		public function neighborhood()
		{
			return $this->belongsTo('neighborhood');
		}

	}

?>