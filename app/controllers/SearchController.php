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
			$minCost = Input::get('min_price');
			$maxCost = Input::get('max_price');

			// Flipping the JOIN
			$builders = new Builder;
			$builders = $builders->newQuery();

			if ($builderName != '0')
			{
				$builders->where('builders.name', $builderName);
			}

			if ($minSqFootage != '0')
			{
				if ($minSqFootage == '99999999')
				{
					$builders->where('builders.min_size', '>', 5000);
				}
				else {
					$builders->where('builders.min_size', '>=', (int)$minSqFootage);
				}
			}

			if ($maxSqFootage != '0')
			{
				if ($maxSqFootage == '99999999')
				{
					$builders->where('builders.max_size', '>', 5000);
				}
				else 
				{
					$builders->where('builders.max_size', '<=', (int)$maxSqFootage);
				}
			} 

			if ($minCost != '0')
			{
				if ($minCost == '99999999')
				{
					$builders->where('builders.min_price', '>', 1000000);
				}
				else
				{
					$builders->where('builders.min_price', '>=', (int)$minCost);	
				}
			}

			if ($maxCost != '0')
			{
				if ($maxCost == '99999999')
				{
					$builders->where('builders.max_price', '>', 1000000);
				}
				else 
				{
					$builders->Where('builders.max_price', '<=', (int)$maxCost);
				}
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

			$builders = $builders->get();
			$builders = $builders->load('neighborhood');
			$totalBuilders = $builders->count();

			if (Auth::Guest())
			{
				$builders = $builders->take(3);
			}
			else
			{
				$builders = $builders;
			}			

			if (Request::ajax())
			{
				$array = array(
					'totalBuildersCount'=>$totalBuilders,
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
				Notifications::danger($messages->first())->save();
				return Redirect::to($data['url']);
			}

			$search = new Search;
			$search->url = $data['url'];
			$search->name = $data['name'];

			Auth::User()->searches()->save($search);

			Notifications::info('Search Saved.')->save();
			return Redirect::to($data['url']);

		}

		public function postSearchLoad()
		{
			$id = Input::get('search');
			$search = Search::where('user_id', Auth::User()->id)->where('id', $id)->first();

			if ($search) 
			{
				$data['url'] = $search->url;
				return Response::json($data);
			}

			Notifications::danger('Invalid Search')->save();
			return Redirect::back();

		}

		public function deleteSearch()
		{
			$id = Input::get('search');

			$search = Search::where('user_id', Auth::User()->id)->where('id', $id)->first();

			if ($search)
			{
				Notification::info('Search Deleted')->save();
				return Redirect::back();
			}

			Notification::danger('Search Reference Not Found')->save();
			return Redirect::back();
		}


	}



?>