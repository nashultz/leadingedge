<?php

	class SearchController extends BaseController {

		public function getResults()
		{
			// Gather Neighborhood Data
			$city = Input::get('city');
			$isd = Input::get('isd');
			$neighborhoodId = Input::get('neighborhood');

			// Gather Builder Data
			$builderName = Input::get('builder');
			$minSqFootage = Input::get('min_sqft');
			$maxSqFootage = Input::get('max_sqft');

			// Flipping the JOIN
			$builders = new Builder;
			$builders = $builders->newQuery();

			if ($builderName != '0')
			{
				$builders->where('builders.name', $builderName);
			}

			if ($minSqFootage != '0')
			{
				$builders->where('builders.min_size', '>=', (int)$minSqFootage);
			}

			if ($maxSqFootage != '0')
			{
				$builders->where('builders.max_size', '<=', (int)$maxSqFootage);
			} 

			if ($city != '0')
			{
				$builders->where('neighborhoods.city', '=', $city);
			}

			if ($neighborhoodId != '0')
			{
				$builders->where('neighborhoods.id', '=', $neighborhoodId);
			}				

			if ($isd != '0')
			{
				$builders->where('neighborhoods.isd', '=', $isd);
			}

			// Now try the FLIP JOIN
			$builders->join('neighborhoods', function($join) use ($city, $isd, $neighborhoodId) {

				$join->on('builders.neighborhood_id', '=', 'neighborhoods.id');	

			});

			if (Auth::Guest())
			{
				$builders = $builders->limit(3)->get();
			}
			else
			{
				$builders = $builders->get();
			}			

			$builders->load('neighborhood');

			if (Request::ajax())
			{
				$array = array(
					'count'=>$builders->count(),
					'builders'=>$builders->toArray()
				);

				return json_encode($array);
			}

			$builderResults = $builders;

			return View::make('search.results', compact('builderResults'));

		}

		public function getSearch()
		{
			return View::make('search.form');
		}

		public function postSearchSave()
		{
			$rules = array(
				'name'=>'nameUniqueToUser',
				'url'=>'urlUniqueToUser'	
			);

			$messages = array(
				'name.name_unique_to_user'=>'Name must be unique. You already have a search with this name.',
				'url.url_unique_to_user'=>'URL must be unique. You already have a search with this criteria'
			);

			Validator::extend('nameUniqueToUser', function($field, $value) {
				$search = Search::where('user_id', Auth::User()->id)->where('name', $value)->first();
				return !$search;
			});

			Validator::extend('urlUniqueToUser', function($field, $value) {
				$search = Search::where('user_id', Auth::User()->id)->where('url', $value)->first();
				return !$search;
			});

			$data = array(
				'name'=>Input::get('name'),
				'url'=>URL::previous()
			);

			$v = Validator::make($data, $rules, $messages);

			if ($v->fails())
			{
				$messages = $v->messages();
				Session::flash('notification', $messages->first());
				return Redirect::to($data['url']);
			}

			$search = new Search;
			$search->url = $data['url'];
			$search->name = $data['name'];

			Auth::User()->searches()->save($search);

			Session::flash('notification', 'Search Saved.');
			return Redirect::to($data['url']);

		}

		public function postSearchLoad()
		{
			$id = Input::get('search');
			$search = Search::where('user_id', Auth::User()->id)->where('id', $id)->first();

			if ($search) 
			{
				Session::flash('notification', 'Search Loaded');
				return Redirect::to($search->url);
			}

			Session::flash('notification', 'Invalid Search');
			return Redirect::back();

		}


	}



?>