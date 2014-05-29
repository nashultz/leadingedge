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

			// Now try the FLIP JOIN
			$builders->join('neighborhoods', function($join) use ($city, $isd, $neighborhoodId) {


				$join->on('builders.neighborhood_id', '=', 'neighborhoods.id');

				if ($city != '0')
				{
					$join->where('neighborhoods.city', '=', $city);
				}

				if ($isd != '0')
				{
					$join->where('neighborhoods.isd', '=', $isd);
				}

				if ($neighborhoodId != '0')
				{
					$join->where('neighborhoods.id', '=', $neighborhoodId);
				}		

			});

			$builders = $builders->get();

			//dd($builders);
			dd(DB::getQueryLog());

			// Trying a JOIN
			$neighborhoods = new Neighborhood;
			$neighborhoods = $neighborhoods->newQuery();


			// Now let's "join" the builders with their criteria...
			$neighborhoods->join('builders', function($join) use ($builderName, $minSqFootage, $maxSqFootage) {

				$join->on('neighborhoods.id', '=', 'builders.neighborhood_id');

				/*
				if ($builderName != '0')
				{
					$join->where('builders.name', '=', $builderName);
				}

				if ($minSqFootage != '0')
				{
					$join->where('min_size', '>=', $minSqFootage);
				}

				if ($maxSqFootage != '0')
				{
					$join->where('max_size', '<=', $maxSqFootage);
				}
				*/

			});

			$neighborhoods = $neighborhoods->get();

			dd(DB::getQueryLog());

			foreach($neighborhoods as $n)
			{
				if (!isset($builderResults))
				{
					$builderResults = $n->builders;
				}
				else 
				{
					$builderResults = $builderResults->merge($n->builders);
				}
			}

			$builderResults->load('neighborhood');

			if (Request::ajax())
			{
				$array = array(
					'count'=>$builderResults->count(),
					'builders'=>$builderResults->toArray()
				);

				dd(DB::getQueryLog());

				return json_encode($array);
			}

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