<?php

	class Search extends Eloquent {

		protected $table = 'searches';

		protected $guarded = array();

		public function user()
		{
			return $this->belongsTo('User');
		}

	}

?>