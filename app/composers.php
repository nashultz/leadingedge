<?php 

/*View::composer('site.index', function($view)
{
	$view->with('slider', site\Listings::slider());
});*/

View::composer('*', function($view) { 

		if (Auth::User())
		{
			$view->with('savedSearches', Auth::User()->searches);
		}

		$cities = Neighborhood::select('city')->distinct()->orderBy('city','ASC');
		$isds = Neighborhood::select('isd','district')->groupBy('isd');

		//Neighborhood::select('isd')->distinct()->get();
		$b = Builder::select('name')->distinct()->get();
		$n = Neighborhood::orderBy('name','ASC')->lists('name', 'id');


		$builders[0] = 'Any';
		$n[0] = 'Any';
		$costOptions[0] = 'Any';
		$sqFootageOptions[0] = 'Any';

		$searchCities = $cities->lists('city','city');
		$searchIsds = $isds->lists('district','isd');

		$searchCities[0] = 'Any';
		$searchIsds[0] = 'Any';

		foreach($b as $builder)
		{
			$builders[$builder->name] = $builder->name;
		}

		for ($a = 10000; $a <= 1000000; $a += 10000)
		{
			$costOptions[$a] = '$' . number_format($a,2);
		}

		// Add Last Option
		$costOptions['99999999'] = "$1,000,000+";

		for ($a = 1000; $a <= 5000; $a += 100)
		{
			$sqFootageOptions[$a] = number_format($a, 0);
		}

		$sqFootageOptions['99999999'] = "5,0000+";

		for ($a = 0; $a <= 10; $a += 1)
		{
			$numRooms[$a] = $a;
		}

		$view->with('searchCities', $searchCities);
		$view->with('searchIsds', $searchIsds);

		$view->with('cities', $cities->get());
		$view->with('isds', $isds->get());
		$view->with('builders', $builders);
		$view->with('neighborhoods', $n);
		$view->with('costOptions', $costOptions);
		$view->with('sqFootageOptions', $sqFootageOptions);
		$view->with('numRooms', $numRooms);
})


?>