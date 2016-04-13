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

use Illuminate\Support\Facades\Redirect;

Route::get('/', function () {
    return view('app');
});


Route::get('id','ApiController@getID');
Route::get('game','ApiController@getParticipants');
Route::post('grades','ApiController@getParticipantsMaxGrades');
