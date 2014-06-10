<?php 

/*View::composer('site.index', function($view)
{
	$view->with('slider', site\Listings::slider());
});*/

View::composer('*', function($view) { 
		$c = Neighborhood::select('city')->distinct()->get();
		$i = Neighborhood::select('isd')->distinct()->get();
		$b = Builder::select('name')->distinct()->get();
		$n = Neighborhood::lists('name', 'id');


		$cities[0] = 'Any';
		$isds[0] = 'Any';
		$builders[0] = 'Any';
		$neighborhoods[0] = 'Any';
		$costOptions[0] = 'Any';
		$sqFootageOptions[0] = 'Any';
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

		for ($a = 10000; $a <= 500000; $a += 10000)
		{
			$costOptions[$a] = '$' . number_format($a,2);
		}

		for ($a = 500; $a <= 5000; $a += 100)
		{
			$sqFootageOptions[$a] = number_format($a, 0);
		}

		for ($a = 0; $a <= 10; $a += 1)
		{
			$numRooms[$a] = $a;
		}

		$view->with('cities', $cities);
		$view->with('isds', $isds);
		$view->with('builders', $builders);
		$view->with('neighborhoods', $n);
		$view->with('costOptions', $costOptions);
		$view->with('sqFootageOptions', $sqFootageOptions);
		$view->with('numRooms', $numRooms);
})


?>