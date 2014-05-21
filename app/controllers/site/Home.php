<?php namespace site;

use BaseController;
use View;
use Notifications;
use Employee;
use Input;

class Home extends BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
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
        return View::make('site.index', compact('builders'));
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