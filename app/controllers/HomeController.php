<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	/**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
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

        return View::make('site.index', compact('cities','isds','builders','neighborhoods','costOptions'));
    }

    public function about()
    {
        //
        //$agents = Employee::get();
        return View::make('site.about'/*,compact('agents')*/);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}