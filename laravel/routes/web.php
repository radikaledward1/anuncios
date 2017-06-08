<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'rutasController@index');

Route::get('anuncio{id}', 'rutasController@vermas');

Route::get('registro', 'rutasController@registro');

Route::get('/login', function () {
	return view('login');
});

Route::post('/login', 'rutasController@auth');

Route::get('/panel', 'rutasController@auth');

Route::post('/logout', 'rutasController@signout');

Route::get('/nuevoanuncios', 'rutasController@nuevoanuncios');
