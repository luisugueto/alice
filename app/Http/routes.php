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
Route::group(['middleware' => 'auth'], function () {

    Route::auth();
    Route::get('/home', 'HomeController@index');
	Route::get('/salir', 'LoginController@logout');
	//URLS REST
	//Route::resource('app', 'AppController');
	Route::get('cargosPersonal/{id}/', 'PersonalController@getCargos');	
	Route::get('seccionesHorarios/{id}/', 'HorariosController@getSecciones');	
	Route::get('asignaturasHorarios/{id}/', 'HorariosController@getAsignaturas');
	Route::get('horarios/buscar', ['uses' => 'HorariosController@search','as' => 'horarios.buscar']);
	Route::get('secciones/{id}/destroy',['uses' => 'SeccionController@destroy','as'  => 'secciones.destroy']);
	Route::get('seccionesHorarios/{id}/', 'HorariosController@getSecciones');
	Route::get('/verPrestamo', ['uses' => 'PrestamosAnticiposController@listado', 'as' => 'prestamos.listado']);
	Route::get('/prestamosTotal', 'PrestamosAnticiposController@total');
	Route::get('/verificarPrestamos', 'PrestamosAnticiposController@ver');
	Route::get('/usuario', 'UsuariosController@index');
	Route::get('/nuevo_usuario', 'UsuariosController@nuevo');
	Route::get('/nuevo_personal', 'PersonalController@nuevo');
	Route::get('/descargarPagosMensual', ['uses' => 'PagosController@descargarPagosMensual', 'as' => 'pagos.mensual']);
	Route::get('descargarPagos', 'PagosController@descargar');
	Route::get('descargarListado', 'PagosController@descargarListado');
	Route::get('descargarControl', 'PagosController@descargarControl');
	Route::get('descargarMorosos', 'FacturacionesController@descargarMorosos');
	//Route::get('asignaturas/{id}/', 'HorariosController@getAsignaturas');
	Route::get('representante/buscar', ['uses' => 'RepresentantesController@search', 'as' => 'representantes.cedula']);
	Route::get('estudiante/buscar', ['uses' => 'EstudiantesController@search', 'as' => 'estudiantes.cedula']);
	Route::get('facturaciones/buscar/estudiante', ['uses' => 'FacturacionesController@search', 'as' => 'facturaciones.buscar']);
	Route::get('morosos', ['uses' => 'FacturacionesController@morosos', 'as' => 'facturaciones.morosos']);
	/*Route::get('bloques/{bloque}/{aula}/', function ($bloque, $aula) {

		$existe = \DB::table('asignacion_bloques')->where([['id_aula', $aula], ['id_bloque', $bloque]])->exists();
		return Response::json($existe);
	});*/
	Route::get('docentes/asignar/{id}/show2',['uses' => 'DocentesController@show2', 'as' => 'docentes.asignar.show2']);
	Route::get('docentes/secciones/{id}/buscar',['uses' => 'DocentesController@buscar', 'as' => 'docentes.secciones.buscar']);
	Route::get('docentes/asignaturas/{id}/buscar2',['uses' => 'DocentesController@buscar2', 'as' => 'docentes.asignaturas.buscar2']);
	Route::get('inscripciones/secciones/{id}/buscar',['uses' => 'DocentesController@buscar', 'as' => 'docentes.secciones.buscar']);
	Route::get('asistencias/salida', 'AsistenciasController@salida');
	Route::get('asistencias/salidas', ['uses' => 'AsistenciasController@salidas', 'as' => 'asistencias.salidas']);
	Route::get('inscripciones/rubros/{id}/buscar',['uses' => 'InscripcionesController@buscarrubros', 'as' => 'inscripciones.rubros.buscar']);
	Route::get('personal/control_de_pagos', 'PersonalController@control');
	Route::get('certificados/listado_estudiantes_inscritos', 'CertificadosController@listado_estudiantes_inscritos');
	Route::get('certificados/{id}/matricula',['uses' => 'CertificadosController@matricula', 'as' => 'certificados.matricula']);
	Route::get('inscripciones/cambiarseccion/{id}/buscar',['uses' => 'InscripcionesController@cambiarseccion', 'as' => 'inscripciones.cambiarseccion.buscar']);
	Route::get('horarios/{seccion}/{curso}/{periodo}/pdf', ['uses' => 'HorariosController@pdf', 'as' => 'horarios.pdf']);
	Route::post('parciales/store2',['uses' => 'ParcialesController@store2', 'as' => 'parciales.store2']);
	Route::get('parciales/asignaturas',['uses' => 'ParcialesController@asignaturas', 'as' => 'parciales.asignaturas']);
	Route::get('parciales/{id}/estudiantes',['uses' => 'ParcialesController@estudiantes', 'as' => 'parciales.estudiantes']);
	Route::get('parciales/mostrarcalificaciones',['uses' => 'ParcialesController@mostrarcalificaciones', 'as' => 'parciales.mostrarcalificaciones']);
	Route::get('parciales/showparcial/{i}/{id_estudiante}',['uses' => 'ParcialesController@showcalificacionesparcial', 'as' => 'parciales.showparcial']);


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
	Route::resource('areas', 'AreaTrabajoController');
	Route::resource('cargos', 'CargosController');
	Route::resource('aulas', 'AulasController');
	Route::resource('rubros', 'RubrosController');
	Route::resource('asignaturas', 'AsignaturasController');
	Route::resource('user_perfil', 'PerfilController');
	Route::resource('horarios', 'HorariosController');
	Route::resource('parciales','ParcialesController');
	Route::resource('quimestres','QuimestresController');
	Route::resource('docentes','DocentesController');
	Route::resource('tipo_empleado','TipoEmpleadoController');
	Route::resource('inscripciones','InscripcionesController');
	Route::resource('asistencias', 'AsistenciasController');
	Route::resource('facturaciones', 'FacturacionesController');

	
});