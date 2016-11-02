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

Route::any('/', function () {
    return view('welcome');
});

Route::post('/save/person',['as' => 'save.person', 'uses' => 'FrontController@create_people']);
Route::any('/view/list', ['nocsrf' => true,'as' => 'view.list', 'uses' => 'FrontController@view_people']);
