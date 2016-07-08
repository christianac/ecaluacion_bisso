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

Route::group( ['middleware' => 'auth'] , function() {

	Route::get('home', 'HomeController@index')->name('home');
	Route::get('home/create', 'HomeController@create')->name('client.create');
	Route::post('home/store', 'HomeController@store')->name('client.store');
	Route::get('home/show/{id}', 'HomeController@show')->name('client.show');
	Route::get('home/edit/{id}', 'HomeController@edit')->name('client.edit');
	Route::put('home/update/{id}', 'HomeController@update')->name('client.update');
	Route::delete('home/destroy/{id}', 'HomeController@destroy')->name('client.destroy');
});
