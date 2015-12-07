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
Route::controllers([
    'auth' => 'Auth\AuthController'
]);

$router->group(['middleware' => 'auth'], function ($router) {
    Route::get('/', function () {
        return view('dashboard.index');
    });

    Route::group(['prefix' => 'bugs'], function () {
        Route::get('/add', 'BugController@add');
        Route::post('/save', 'BugController@save');
    });
});
