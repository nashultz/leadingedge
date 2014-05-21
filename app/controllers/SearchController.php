<?php

	class SearchController extends BaseController {

		public function getResults()
		{
			$city = Input::get('city');
			$isd = Input::get('isd');
			$builder = Input::get('builder');
			$neighborhood = Input::get('neighborhood');
			$minPrice = Input::get('min_price');
			$maxPrice = Input::get('max_price');
			
			$builders = new Builder;
			$builders = $builders->newQuery();

			if ($minPrice > $maxPrice)
			{
				Session::flash('notification', 'Min Price cannot be Greater than Max Price');
				return Redirect::route('get.search.index');
			}

			if ($city != '0')
			{
				$builders->where('city', $city);
			}

			if ($isd != '0')
			{
				$builders->where('isd', $isd);
			}

			if ($builder != '0')
			{
				$builders->where('name', $builder);
			}

			if ($neighborhood != '0')
			{
				$n = Neighborhood::where('name', $neighborhood)->first();
				$builders->where('neighborhood_id', $n->id);
			}

			if ($minPrice != '0')
			{
				$builders->where('min_price', '>=', $minPrice);
			}

			if ($maxPrice != '0')
			{
				$builders->where('max_price', '<=', $maxPrice);
			}

			$builders = $builders->get();

			return View::make('search.results', compact('builders'));

		}

		public function getSearch()
		{
			$c = Neighborhood::select('city')->distinct()->get();

			$i = Neighborhood::select('isd')->distinct()->get();
			$b = Builder::select('name')->distinct()->get();
			$n = Neighborhood::select('name')->distinct()->get();


			$cities[0] = 'Any';
			$isds[0] = 'Any';
			$builders[0] = 'Any';
			$neighborhoods[0] = 'Any';
			$costOptions[0] = 'Any';
			foreach($c as $city)
			{
				$cities[$city->city] = $city->city;
			}

			foreach($i as $isd)
			{
				$isds[$isd->isd] = $isd->isd;
			}

			foreach($b as $builder)
			{
				$builders[$builder->name] = $builder->name;
			}

			foreach($n as $neighborhood)
			{
				$neighborhoods[$neighborhood->name] = $neighborhood->name;
			}

			for ($a = 10000; $a <= 500000; $a += 10000)
			{
				$costOptions[$a] = $a;
			}

			return View::make('search.form',compact('cities','isds','builders','neighborhoods','costOptions'));
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