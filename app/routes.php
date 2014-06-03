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
$models = array(
	
);

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

	if (Auth::Guest())
	{
		$builders = Builder::with('neighborhood')->limit(3)->get()->toArray();
	}
	else
	{
		$builders = Builder::with('neighborhood')->get()->toArray();
	}	

	$array = array(

		'count' => count($builders),
		'builders' => $builders

	);

	return json_encode($array);

});


Route::get('geocode', function() {

	$n = Neighborhood::get();

	foreach($n as $neighborhood)
	{
		$string = str_replace(" ", "+", $neighborhood->name);
		$string .= ",";
		$string .= str_replace(" ", "+", $neighborhood->city);
		$string .= ",";
		$string .= str_replace(" ", "+", 'TX');
		$string .= "&sendor=false&key=AIzaSyAEBmha5MZ-DEIYcTpyNmdPi5fbQZIyJBU";

		$url = "https://maps.googleapis.com/maps/api/geocode/json?address=".$string;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$response = json_decode(curl_exec($ch), true);

		if ($response['status'] != 'OK')
		{
			dd('PROBLEM');
		}

		$geometry = $response['results'][0]['geometry'];

		$array = array(
	        'latitude' => $geometry['location']['lng'],
	        'longitude' => $geometry['location']['lat']
    	);

    	$neighborhood->latitude = $array['latitude'];
    	$neighborhood->longitude = $array['longitude'];
    	$neighborhood->save();

	}

	dd('geocoded');

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

Route::get('/',array('uses'=>'HomeController@index','as'=>'site.index'));
Route::get('about',array('uses'=>'HomeController@about','as'=>'site.about'));
Route::get('school-ratings',array('uses'=>'HomeController@schoolratings','as'=>'site.schoolratings'));
Route::get('testimonials',array('uses'=>'HomeController@testimonials','as'=>'site.testimonials'));

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

