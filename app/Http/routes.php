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
Route::group(['middleware' => 'web'], function () {

    Route::auth();
    Route::get('/home', 'HomeController@index');
	Route::get('/salir', 'LoginController@logout');
	//URLS REST
	#Route::resource('app', 'AppController');
	Route::resource('asistencias', 'AsistenciasController');
	Route::resource('horarios', 'HorariosController');
	Route::resource('usuarios', 'UsuariosController');
	Route::resource('personal', 'PersonalController');
	Route::resource('estudiantes', 'EstudiantesController');
	Route::resource('login', 'LoginController');

	Route::get('/usuario', 'UsuariosController@index');

	Route::get('/nuevo_usuario', 'UsuariosController@nuevo');
	Route::get('/nuevo_personal', 'PersonalController@nuevo');
});
	
