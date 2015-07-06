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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/post','PostController@index');
Route::get('/entry','EntryController@index');
Route::get('/entry/create','EntryController@create');
Route::get('/entry/delete/{id}','EntryController@delete');
Route::post('/entry/store','EntryController@store');


Route::get('/test', function () {
    return view('welcome');
});



// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::get('/api/loggedUser','TaskController@loggedUser');


Route::get('category/create','CategoryController@create');
Route::post('category/store','CategoryController@store');

Route::get('category','CategoryController@index');

Route::get('/entry/getdoc/{id}', 'EntryController@download');




Route::get('/task','TaskController@index');
Route::get('/task/create','TaskController@create');
Route::get('/task/delete/{id}','TaskController@delete');
Route::post('/task/store','TaskController@store');

Route::get('/angular/task','TaskController@angularTask');
Route::get('/api/tasks','TaskController@apitasks');
Route::post('/api/task','TaskController@apitasksPost');
Route::put('/api/task/{id}','TaskController@apitasksPut');
Route::delete('/api/task/{id}','TaskController@apitaskDelete');
Route::get('/api/users','TaskController@apiUsers');
