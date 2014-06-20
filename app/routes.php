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
	return View::make('idx.idx');
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
Route::get('neighborhoods/{neighborhoods}',array('uses'=>'HomeController@neighborhood','as'=>'site.neighborhood'));

// Search
Route::get('search', array('as'=>'get.search.index', 'uses'=>'SearchController@getSearch'));
Route::get('search/results', array('as'=>'get.search.results', 'uses'=>'SearchController@getResults'));
Route::post('search/save', array('as'=>'post.search.save', 'uses'=>'SearchController@postSearchSave'));
Route::post('search/load', array('as'=>'post.search.load', 'uses'=>'SearchController@postSearchLoad'));

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

