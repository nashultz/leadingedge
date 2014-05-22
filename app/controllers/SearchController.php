<?php

	class SearchController extends BaseController {

		public function getResults()
		{
			// Gather Input
			$city = Input::get('city');
			$isd = Input::get('isd');
			$builder = Input::get('builder');
			$neighborhood = Input::get('neighborhood');
			$minPrice = Input::get('min_price');
			$maxPrice = Input::get('max_price');
			$minSqFootage = Input::get('min_sqft');
			$maxSqFootage = Input::get('max_sqft');

			// Find Neighborhoods with Criteria
			$neighborhoods = new Neighborhood;
			$neighborhoods = $neighborhoods->newQuery();
			
			if ($city != '0')
			{
				$neighborhoods->where('city', $city);
			}

			if ($isd != '0')
			{
				$neighborhoods->where('isd', $isd);
			}

			if ($neighborhood)
			{
				$neighborhoods->where('id', $neighborhood);
			}

			$neighborhoods = $neighborhoods->get();

			// Neighborhoods Found

			// Now let's load the builders within those neighborhoods with the criteria
			$neighborhoods->load(array('builders' => function($query) use ($builder, $minPrice, $maxPrice, $minSqFootage, $maxSqFootage) {

				if ($minPrice > $maxPrice)
				{
					Session::flash('notification', 'Min Price cannot be Greater than Max Price');
					return Redirect::route('get.search.index');
				}

				if ($builder != '0')
				{
					$query->where('name', $builder);
				}
			
				if ($minPrice != '0')
				{
					$query->where('min_price', '>=', $minPrice);
				}

				if ($maxPrice != '0')
				{
					$query->where('max_price', '<=', $maxPrice);
				}

				if ($minSqFootage != '0')
				{
					$query->where('min_size', $minSqFootage);
				}

				if ($maxSqFootage != '0')
				{
					$query->where('max_size', $maxSqFootage);	
				}

			}));

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