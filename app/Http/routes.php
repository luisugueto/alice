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
	Route::get('personal/destroy',['uses' => 'PersonalController@destroy','as'  => 'personal.destroy']);
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
    Route::get('horario/profesor', ['uses' => 'HorariosController@index2', 'as' => 'horario.profesor']);
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
	Route::get('inscripciones/cambiarseccion/{id}/buscar',['uses' => 'InscripcionesController@cambiarseccion', 'as' => 'inscripciones.cambiarseccion.buscar']);
	Route::get('horarios/{seccion}/{curso}/{periodo}/pdf', ['uses' => 'HorariosController@pdf', 'as' => 'horarios.pdf']);
	Route::post('parciales/store2',['uses' => 'ParcialesController@store2', 'as' => 'parciales.store2']);
	Route::get('parciales/asignaturas',['uses' => 'ParcialesController@asignaturas', 'as' => 'parciales.asignaturas']);
	Route::get('parciales/{id}/estudiantes',['uses' => 'ParcialesController@estudiantes', 'as' => 'parciales.estudiantes']);
	Route::get('parciales/mostrarcalificaciones',['uses' => 'ParcialesController@mostrarcalificaciones', 'as' => 'parciales.mostrarcalificaciones']);
	Route::get('parciales/{id_seccion}/mostrarcalificaciones_coord',['uses' => 'ParcialesController@mostrarcalificaciones_coord', 'as' => 'parciales.mostrarcalificaciones_coord']);
	Route::get('parciales/showparcial/{i}/{id_estudiante}/{tipo_user}',['uses' => 'ParcialesController@showcalificacionesparcial', 'as' => 'parciales.showparcial']);
	Route::get('parciales/showquimestre/{i}/{id_estudiante}/{tipo_user}',['uses' => 'ParcialesController@showcalificacionesquimestre', 'as' => 'parciales.showquimestre']);
	Route::get('parciales/print/{i}/{id_estudiante}/{tipo_user}', ['uses' => 'ParcialesController@pdf', 'as' => 'parciales.pdf']);
	Route::get('docentes/asignar/{id}/show3',['uses' => 'DocentesController@show3', 'as' => 'docentes.asignar.show3']);
	Route::post('docentes/store2',['uses' => 'DocentesController@store2', 'as' => 'docentes.store2']);

	Route::get('certificados/listado_estudiantes_inscritos', 'CertificadosController@listado_estudiantes_inscritos');
	Route::get('certificados/{id}/matricula',['uses' => 'CertificadosController@matricula', 'as' => 'certificados.matricula']);
	Route::get('certificados/laboral',['uses' => 'CertificadosController@laboral', 'as' => 'certificados.laboral']);
	Route::get('certificados/listado_personal',['uses' => 'CertificadosController@personal', 'as' => 'certificados.personal']);
	Route::get('certificados/comportamiento',['uses' => 'CertificadosController@comportamiento', 'as' => 'certificados.comportamiento']);
	Route::get('certificados/listado_estudiantes_comportamiento',['uses' => 'CertificadosController@estudiantesComportamiento', 'as' => 'certificados.estudiantesComportamiento']);
	Route::get('docentes/{id}/coordinacion',['uses' => 'DocentesController@coordinacion', 'as' => 'docentes.coordinacion']);
	Route::get('docentes/{id}/destroy',['uses' => 'DocentesController@destroy', 'as' => 'docentes.destroy']);
	Route::get('parciales/coordinacion',['uses' => 'ParcialesController@coordinacion', 'as' => 'parciales.coordinacion']);
	Route::get('parciales/{id}/show-estudiantes',['uses' => 'ParcialesController@buscarestudiantes', 'as' => 'parciales.show-estudiantes']);
	Route::get('parciales/{id}/show-rectificar-parcial',['uses' => 'ParcialesController@show_rectificar_parcial','as' => 'parciales.show-rectificar-parcial']);
	Route::post('parciales.rectificacion',['uses' => 'ParcialesController@rectificacion', 'as' => 'parciales.rectificacion']);
	Route::get('parciales/{id}/show-rectificar-quimestral',['uses' => 'ParcialesController@show_rectificar_quimestral','as' => 'parciales.show-rectificar-quimestral']);
	Route::post('parciales.rectificacion2',['uses' => 'ParcialesController@rectificacion2', 'as' => 'parciales.rectificacion2']);
	Route::post('parciales/acciones_anuales',['uses' => 'ParcialesController@acciones_anuales', 'as' => 'parciales.acciones_anuales']);
	Route::post('parciales/cargar_recuperativo',['uses' => 'ParcialesController@cargar_recuperativo', 'as' => 'parciales.cargar_recuperativo']);
	Route::post('parciales/rectificar_recuperativo',['uses' => 'ParcialesController@rectificar_recuperativo', 'as' => 'parciales.rectificar_recuperativo']);
	Route::post('asistencias/upload', ['uses' => 'AsistenciasController@upload', 'as' => 'archivo.upload']);
    Route::get('asistencias/archivo', ['uses' => 'AsistenciasController@archivo', 'as' => 'archivo.asistencias']);

    Route::get('parciales/printquimestre/{i}/{id_estudiante}/{tipo_user}', ['uses' => 'ParcialesController@pdfquimestre', 'as' => 'quimestre.pdf']);
    Route::get('parciales/mostrarasignaturas/{i}/{id_estudiante}',['uses' => 'ParcialesController@mostrarasignaturas', 'as' => 'parciales.mostrarasignaturas']);
    Route::get('parciales/parcial_admin/{id_estudiante}/{id_asignatura}',['uses' => 'ParcialesController@parcial_admin', 'as' => 'parciales.parcial_admin']);
    Route::get('parciales/asignaturas_admin/{id_docente}',['uses' => 'ParcialesController@asignaturas_admin', 'as' => 'parciales.asignaturas_admin']);
    Route::get('parciales/parcial_admin2/{id_estudiante}/{id_docente}',['uses' => 'ParcialesController@parcial_admin2', 'as' => 'parciales.parcial_admin2']);
    Route::get('parciales/estudiantes2/{id_seccion}/{id_docente}',['uses' => 'ParcialesController@estudiantes2', 'as' => 'parciales.estudiantes2']);
    Route::get('parciales/quimestre_admin/{id_seccion}/{id_docente}',['uses' => 'ParcialesController@quimestre_admin', 'as' => 'parciales.quimestre_admin']);
    //---admin dace---
    Route::get('parciales/secciones',['uses' => 'ParcialesController@buscarseccion', 'as' => 'parciales.secciones']);
    Route::post('parciales/mostrarcalificaciones_admin',['uses' => 'ParcialesController@mostrarcalificaciones_admin', 'as' => 'parciales.mostrarcalificaciones_admin']);
    

    Route::get('parciales/printquimestre/{i}/{id_estudiante}', ['uses' => 'ParcialesController@pdfquimestre', 'as' => 'quimestre.pdf']);

    Route::get('respaldos/download/{file_name}', ['uses' => 'RespaldosController@download', 'as' => 'respaldos.download']);
    Route::get('respaldos/restore/{file_name}', ['uses' => 'RespaldosController@restore', 'as' => 'respaldos.restore']);
    Route::get('respaldos/subir', ['uses' => 'RespaldosController@subir', 'as' => 'respaldos.subir']);
    Route::post('respaldos/subirRestore', ['uses' => 'RespaldosController@subirRestore', 'as' => 'respaldos.subirRestore']);
    Route::get('respaldos/restore/{file_name}', ['uses' => 'RespaldosController@restore', 'as' => 'respaldos.restore']);

    Route::resource('respaldos', 'RespaldosController');

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
	Route::resource('periodos', 'PeriodosController');
	Route::resource('descuentos','DescuentoController');

	
});