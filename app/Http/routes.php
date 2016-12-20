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
	
<<<<<<< HEAD
	Route::get('seccionesHorarios/{id}/', 'HorariosController@getSecciones');	
	Route::get('asignaturasHorarios/{id}/', 'HorariosController@getAsignaturas');
=======
>>>>>>> a7323024dbbbde95b587bef487b9357a4f919fb0


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


	Route::get('secciones/{id}/destroy',[

			'uses' => 'SeccionController@destroy',
			'as'  => 'secciones.destroy'
				]);
	Route::get('seccionesHorarios/{id}/', 'HorariosController@getSecciones');	
	Route::resource('areas', 'AreaTrabajoController');
	Route::resource('cargos', 'CargosController');
	Route::resource('aulas', 'AulasController');
	Route::resource('rubros', 'RubrosController');
	Route::resource('asignaturas', 'AsignaturasController');
	Route::resource('user_perfil', 'PerfilController');
	Route::resource('horarios', 'HorariosController');

	Route::get('/verPrestamo', ['uses' => 'PrestamosAnticiposController@listado', 'as' => 'prestamos.listado']);
	Route::get('/prestamosTotal', 'PrestamosAnticiposController@total');
	Route::get('/verificarPrestamos', 'PrestamosAnticiposController@ver');

	Route::get('/usuario', 'UsuariosController@index');

	Route::get('/nuevo_usuario', 'UsuariosController@nuevo');
	Route::get('/nuevo_personal', 'PersonalController@nuevo');

	Route::resource('parciales','ParcialesController');
	Route::resource('quimestres','QuimestresController');

	Route::get('/descargarPagosMensual', ['uses' => 'PagosController@descargarPagosMensual', 'as' => 'pagos.mensual']);
	Route::get('descargarPagos', 'PagosController@descargar');
	Route::get('descargarListado', 'PagosController@descargarListado');
	
	Route::get('asignaturas/{id}/', 'HorariosController@getAsignaturas');

	Route::get('representante/buscar', ['uses' => 'RepresentantesController@search', 'as' => 'representantes.cedula']);
	Route::get('estudiante/buscar', ['uses' => 'EstudiantesController@search', 'as' => 'estudiantes.cedula']);
	Route::get('rubros/buscar/estudiante', ['uses' => 'RubrosController@search', 'as' => 'rubros.buscar.estudiante']);
	Route::get('horarios/buscar', [
		'uses' => 'HorariosController@index',
		'as' => 'horarios.buscar'
		]);
});
	
