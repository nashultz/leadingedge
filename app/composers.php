<?php 

/*View::composer('site.index', function($view)
{
	$view->with('slider', site\Listings::slider());
});*/

View::composer('*', function($view) {
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
			$costOptions[$a] = '$' . number_format($a,2);
		}

		$view->with('cities', $cities);
		$view->with('isds', $isds);
		$view->with('builders', $builders);
		$view->with('neighborhoods', $neighborhoods);
		$view->with('costOptions', $costOptions);
})


?>