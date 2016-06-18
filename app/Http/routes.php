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

Route::resource('users', 'UserController', ['except' => ['edit', 'create']]);
Route::options('users', 'UserController@options');
Route::resource('courts', 'CourtController', ['except' => ['edit', 'create']]);
Route::options('courts', 'CourtController@options');
Route::resource('reservations', 'CourtsUsersController', ['except' => ['edit', 'create']]);

Route::auth();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('admin', 'AdminController@index');
Route::get('admin/users', 'AdminController@users');
Route::get('admin/courts', 'AdminController@courts');
Route::get('admin/profile', 'AdminController@profile');
Route::get('admin/reservations', 'AdminController@reservations');

