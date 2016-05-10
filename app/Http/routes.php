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


Route::get('/', function(){
	return View::make('talkers.index');
});
Route::get('admin', function(){
	return Redirect::to('admin/dashboard');
});
Route::get('speaker', 'PageController@getSpeakerPage');
Route::get('speaker/{id}', 'PageController@getSpeakerDetailPage');
Route::get('review/speaker/{id}', 'PageController@getReviewPage');

Route::get('questionnaire/create', function(){
	return View::make('talkers.create');
});
Route::get('questionnaire/form', 'Questionnaire\QuestionnaireController@index');
Route::post('questionnaire/create', 'Questionnaire\QuestionnaireController@create');
Route::post('questionnaire/talkerStore', 'Questionnaire\QuestionnaireController@talkerStore');

Route::get('admin/form/{type}', 'PageController@getFormPage');
Route::post('talker', 'FormController@createTalker');
Route::get('data/talker', 'Speaker\SpeakerController@index');
Route::post('event', 'FormController@createEvent');
Route::post('review', 'FormController@createReview');

//Admin Scope
Route::get('admin/{type}', 'PageController@getAdminPage');