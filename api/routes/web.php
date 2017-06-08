<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$app->get('/', function () use ($app) {
    return 'Anuncios API';
});

// Usuarios

$app->get('/get/users', 'loginController@allUsers');
$app->post('/login', 'loginController@login');
$app->post('/registro', 'loginController@create');
$app->put('/login/{id}', 'loginController@update');

// Anuncios
$app->get('/anuncios', 'anunciosController@index');
$app->post('/add/anuncio', 'anunciosController@createNew');
$app->get('/categoria/{categoria}', 'anunciosController@find');
$app->get('/anuncio/{id}', 'anunciosController@findById');
$app->get('/user/anuncios/{id}', 'anunciosController@findByIdUser');
$app->put('/update/{id}', 'anunciosController@update');
$app->delete('/anuncios/{id}', 'anunciosController@delete');

// Categorias

$app->get('/get/categorias', 'categoriaController@getCategorias');
$app->post('/add/categoria', 'categoriaController@addCategoria');

//

// $app->group(['prefix' => 'anuncios', 'namespace' => 'App\Http\Controllers'], function($app) {
//
    // // http://localhost:8000/anuncios
    // $app->get('/', 'AnunciosController@index');
    // // http://localhost:8000/guitars/50
    // $app->get('{id}', 'AnunciosController@find');
    // // http://localhost:8000/anuncios
    // $app->post('/', 'AnunciosController@create');
    // // $app->post('/', ['middleware' => 'auth',
    // //     'uses' => 'GuitarController@create']);
    // // http://localhost:8000/anuncios/50
    // $app->put('{id}', 'AnunciosController@update');
    //
    // // http://localhost:8000/anuncios/50
    // $app->delete('{id}', 'AnunciosController@delete');
// });
