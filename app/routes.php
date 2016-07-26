<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




Route::group(['middleware' => 'web'], function () {
    //Route::auth();
    // Authentication Routes...
	$this->get('login', 'Auth\AuthController@showLoginForm');
	$this->post('login', 'Auth\AuthController@login');
	$this->get('logout', 'Auth\AuthController@logout');

	

	// Password Reset Routes...
	$this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
	$this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
	$this->post('password/reset', 'Auth\PasswordController@reset');
});
Route::group(['middleware' => 'auth'], function () {
	Route::get('/', function(){
		return Redirect::to('dashboard');
	});

	// Registration Routes...
	$this->get('register', 'Auth\AuthController@getRegister');
	$this->post('register', 'Auth\AuthController@postRegister');

	Route::get('speaker', 'PageController@getSpeakerPage');
	Route::get('speaker/{id}', 'PageController@getSpeakerDetailPage');
	Route::get('review/speaker/{id}', 'PageController@getReviewPage');
	/*Route::get('questionnaire/create', function(){
		return View::make('talkers.create');
	});
	Route::get('questionnaire/form', 'Questionnaire\QuestionnaireController@index');
	Route::post('questionnaire/create', 'Questionnaire\QuestionnaireController@create');
	Route::post('questionnaire/talkerStore', 'Questionnaire\QuestionnaireController@talkerStore');
	*/
	Route::get('form/{type}', 'PageController@getFormPage');

	//speaker scope
	Route::post('speaker', 'FormController@createSpeaker');
	Route::post('speaker/{id}', 'FormController@updateSpeaker');
	Route::delete('speaker/{id}', 'FormController@deleteSpeaker');
	Route::get('speakers', 'Speaker\SpeakerController@index');
	Route::get('speaker/{id}', 'Speaker\SpeakerController@getSpeaker');

	//talk scope
	Route::post('talk', 'FormController@createTalk');
	Route::post('talk/{id}', 'FormController@updateTalk');
	Route::delete('talk/{id}', 'FormController@deleteTalk');
	Route::get('talk/{id}', 'Speaker\TalkController@getTalk');

	//event scope
	Route::get('event/{id}', 'Speaker\EventController@getEvent');
	Route::get('event/{id}/locations', 'Speaker\EventController@getLocations');
	Route::get('event/{id}/details', 'Speaker\EventController@getEventDetail');
	Route::get('series/{id}/details', 'Speaker\EventController@getSeriesDetail');
	//location scope
	Route::get('location/{id}', 'Speaker\LocationController@getLocation');

	//Route::post('talk', 'FormController@createTalk');
	Route::post('review', 'FormController@createReview');

	//Admin Scope
	Route::get('{type}', 'PageController@getAdminPage');
	Route::get('{type}/create', 'PageController@getAdminFormPage');
});

