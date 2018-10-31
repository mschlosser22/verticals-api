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

use App\Program;
use App\School;
use App\Vertical;
use App\Subvertical;

Route::group(['middleware' => ['web']], function () {

	Route::auth();
	Route::get('register', 'SchoolController@index');
    Route::post('register', 'SchoolController@index');

	Route::get('/', 'SchoolController@index');
	Route::get('home', 'SchoolController@index');

	Route::post('schools', 'SchoolController@store');
	Route::delete('schools/{school}', 'SchoolController@delete');

	Route::get('verticals/{school}', 'VerticalController@index');
	Route::post('verticals', 'VerticalController@store');
	Route::delete('verticals/{vertical}', 'VerticalController@delete');

	Route::get('subverticals/{school}/{vertical}', 'SubverticalController@index');
	Route::post('subverticals', 'SubverticalController@store');
	Route::delete('subverticals/{subvertical}', 'SubverticalController@delete');

	Route::get('programs/{school}/{vertical}/{subvertical}', 'ProgramController@index');
	Route::post('programs', 'ProgramController@store');
	Route::delete('programs/{program}', 'ProgramController@delete');
	Route::get('programs/{program}', 'ProgramController@show');
	Route::patch('programs/{program}', 'ProgramController@update');

	Route::group(['prefix' => 'api', 'middleware' => 'throttle'], function () {
	    Route::get('school', function () {
	        return School::all()->pluck('name', 'id');
	    });
	    Route::get('program/{program}', 'ProgramController@api');
	    Route::get('programs/{school}', 'ProgramController@school');
	});

});