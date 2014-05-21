<?php


	   Event::listen('eloquent.creating*', function($obj)
	   {
	   		if ($obj->byUser) {
		   		$obj->created_by = Auth::user()->id;
		   		$obj->updated_by = Auth::user()->id;	   			
	   		}
	   });	   

	   Event::listen('eloquent.updating*', function($obj)
	   {
	   		if ($obj->byUser) {
	   			$obj->updated_by = Auth::user()->id;
	   		}	       
	   });

	   Event::listen('eloquent.deleting*', function($obj)
	   {
	   		if ($obj->byUser) {
				$obj->deleted_by = Auth::user()->id;
	   		}	   	   
	   });	   

		Event::listen('eloquent.created: Image',function($image) {
			$image->sort_order = $image->id;
			$image->save();
		});	


?>