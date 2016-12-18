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

	Route::get('representante/buscar', ['uses' => 'RepresentantesController@search', 'as' => 'representantes.cedula']);
	Route::get('estudiante/buscar', ['uses' => 'EstudiantesController@search', 'as' => 'estudiantes.cedula']);



	Route::resource('asistencias', 'AsistenciasController');
	Route::resource('horarios', 'HorariosController');
	Route::resource('usuarios', 'UsuariosController');
	Route::resource('personal', 'PersonalController');
	Route::resource('estudiantes', 'EstudiantesController');
	Route::resource('representantes', 'RepresentantesController');
	Route::resource('login', 'LoginController');
	Route::resource('iess', 'IESSController');
	Route::resource('prestamos', 'PrestamosAnticiposController');
	Route::resource('pagos', 'PagosController');
	Route::resource('secciones', 'SeccionController');
	Route::resource('aulas', 'AulasController');
	Route::resource('rubros', 'RubrosController');


	Route::get('/verPrestamo', ['uses' => 'PrestamosAnticiposController@listado', 'as' => 'prestamos.listado']);
	Route::get('/prestamosTotal', 'PrestamosAnticiposController@total');
	Route::get('/verificarPrestamos', 'PrestamosAnticiposController@ver');

	Route::get('/usuario', 'UsuariosController@index');

	Route::get('/nuevo_usuario', 'UsuariosController@nuevo');
	Route::get('/nuevo_personal', 'PersonalController@nuevo');

	Route::resource('parciales','ParcialesController');
	Route::resource('quimestres','QuimestresController');
});
	
