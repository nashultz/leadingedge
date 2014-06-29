<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
// Change to Routes...

$models = array(
	'neighborhoods'=>'Neighborhood',
);

Route::post('visitor/check', function() {

	$ip = Request::getClientIp();

	$visitor = Visitor::where('ip', $ip)->first();

	if ($visitor)
	{
		$data['first'] = false;
		$visitor->logins += 1;
		$visitor->save();
	}
	else
	{
		$visitor = new Visitor();
		$visitor->ip = $ip;
		$visitor->logins = 1;
		$visitor->save();

		$data['first'] = true;
		$data['video'] = View::make('videos.intro_autoplay')->render();
	}

	return Response::json($data);

});

Route::get('idx',function() {

	$args = array();
	$appendString = '';

	if (Input::get('search_city') != 'Any')
	{
		$args[] = 'search_city=' . Input::get('search_city');
	}

	if (Input::get('minimum_price') != '0')
	{
		$args[] = 'minimum_price=' . Input::get('minimum_price');
	}

	if (Input::get('maximum_price') != '0')
	{
		$args[] = 'maximum_price=' . Input::get('maximum_price');
	}

	if (Input::get('minimum_sqft') != '0')
	{
		$args[] = 'minimum_sqft=' . Input::get('minimum_sqft');
	}

	if (Input::get('maximum_sqft') != '0')
	{
		$args[] = 'maximum_sqft=' . Input::get('maximum_sqft');
	}

	foreach($args as $index=>$arg)
	{
		if ($index == 0)
		{
			$appendString .= '?' . $arg;
		}
		else
		{
			$appendString .= '&' . $arg;
		}
	}

	return View::make('idx.idx', array('appendString'=>$appendString));
});

Route::post('idx', function() {

	$args = array();
	$appendString = '?';

	if (Input::get('city') != 'Any')
	{
		$args[] = 'search_city=' . Input::get('city');
	}

	if (Input::get('min_price') != '0')
	{
		$args[] = 'minimum_price=' . Input::get('min_price');
	}

	if (Input::get('max_price') != '0')
	{
		$args[] = 'maximum_price=' . Input::get('max_price');
	}

	if (Input::get('min_sqft') != '0')
	{
		$args[] = 'minimum_sqft=' . Input::get('min_sqft');
	}

	if (Input::get('max_sqft') != '0')
	{
		$args[] = 'maximum_sqft=' . Input::get('max_sqft');
	}

	foreach($args as $index=>$arg)
	{
		if ($index == 0)
		{
			$appendString .= $arg;
		}
		else
		{
			$appendString .= '&' . $arg;
		}
	}

	$data['url'] = URL::to('idx') . $appendString;

	return Response::json($data, 200);

});

Route::get('neighborhood/getBuilders', function() {

	$id = Input::get('id');

	$neighborhood = Neighborhood::with('builders')->where('id', $id)->first();

	if ($neighborhood)
	{
		$ajaxBuilders = $neighborhood->builders;	
	}	

	return View::make('layouts.infowindow-builders', compact('ajaxBuilders','neighborhood'))->render();

	//return json_encode($n->builders->toArray());

});

Route::get('builders/load', function() {

	$builders = Builder::with('neighborhood')->get();
	$totalBuilders = $builders->count();

	$builders = $builders->toArray();

	$array = array(
		'totalBuildersCount' => $totalBuilders,
		'count' => count($builders),
		'builders' => $builders

	);

	return json_encode($array);

});


Route::get('geocode', function() {

	

});

foreach($models as $match=>$model) {
	Route::bind($match,function($id) use ($model) {
		$object = $model::withTrashed()->where('id',$id)->first();
		return ($object ?: false);
	});
}

Route::bind('user', function($value) {
	$user = User::where('username', $value)->first();
	if ($user) return $user;
	App::abort(404);
});
Route::bind('neighborhoods',function($value)
{
	$neighborhood = Neighborhood::where('slug',$value)->first();
	if ($neighborhood) return $neighborhood;
	App::abort(404);
});

Route::get('/',array('uses'=>'HomeController@index','as'=>'site.index'));
Route::get('about',array('uses'=>'HomeController@about','as'=>'site.about'));
Route::get('school-ratings',array('uses'=>'HomeController@schoolratings','as'=>'site.schoolratings'));
Route::get('realtor',array('uses'=>'HomeController@realtor','as'=>'site.realtor'));
Route::get('testimonials',array('uses'=>'HomeController@testimonials','as'=>'site.testimonials'));
Route::get('submit-a-testimonial',array('uses'=>'HomeController@testimonialform','as'=>'site.testimonial.form'));
Route::post('testimonials',array('uses'=>'HomeController@mailtestimonial','as'=>'site.testimonials.send'));
Route::get('neighborhoods/{neighborhoods}',array('uses'=>'HomeController@neighborhood','as'=>'site.neighborhood'));

// Search
Route::get('search', array('as'=>'get.search.index', 'uses'=>'SearchController@getSearch'));
Route::get('search/results', array('as'=>'get.search.results', 'uses'=>'SearchController@getResults'));
Route::post('search/save', array('as'=>'post.search.save', 'uses'=>'SearchController@postSearchSave'));
Route::post('search/load', array('as'=>'post.search.load', 'uses'=>'SearchController@postSearchLoad'));
Route::delete('search/delete', array('as'=>'post.search.delete', 'uses'=>'SearchController@deleteSearch'));

Route::post('perfect-home',array('as'=>'post.perfecthome.send','uses'=>'ButtonController@postPerfectHome'));
Route::post('new-austin',array('as'=>'post.newaustin.send','uses'=>'ButtonController@postNewAustin'));
Route::post('sell-home',array('as'=>'post.sellhome.send','uses'=>'ButtonController@postSellHome'));
Route::post('afford-home',array('as'=>'post.affordhome.send','uses'=>'ButtonController@postAffordHome'));

Route::get('contact',array('uses'=>'ContactController@index','as'=>'site.contact'));
Route::post('contact/send',array('uses'=>'ContactController@send','as'=>'site.contact.send'));

Route::get('mortgage', array('uses'=>'MortgageController@index', 'as'=>'site.mortgage'));

// Auth Routes
//Route::get('auth/register', array('as'=>'get.auth.register', 'uses'=>'AuthController@getRegister'));
Route::post('auth/register', array('as'=>'post.auth.register', 'uses'=>'AuthController@postRegister'));

Route::get('auth/login', array('as'=>'get.auth.login', 'uses'=>'AuthController@getLogin'));
Route::post('auth/login', array('as'=>'post.auth.login', 'uses'=>'AuthController@postLogin'));

Route::get('auth/logout', array('as'=>'get.auth.logout', 'uses'=>'AuthController@getLogout'));

Route::get('auth/forgot_email', array('as'=>'get.auth.forgot.email', 'uses'=>'AuthController@getForgotEmail'));
Route::post('auth/forgot_email', array('as'=>'post.auth.forgot.email', 'uses'=>'AuthController@postForgotEmail'));

Route::get('auth/forgot_password', array('as'=>'get.auth.forgot.password', 'uses'=>'AuthController@getForgotPassword'));
Route::post('auth/forgot_password', array('as'=>'post.auth.forgot.password', 'uses'=>'AuthController@postForgotPassword'));

Route::get('auth/confirm/{user}/{code}', array('as'=>'get.auth.confirmation', 'uses'=>'AuthController@getConfirmation'));

