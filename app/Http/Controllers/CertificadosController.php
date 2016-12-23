<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Periodos;
use DB;
use App\Http\Requests;
use PDF;

class CertificadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function matricula($id){
        $id_periodo=Session::get('periodo');
        $periodo=Periodos::where('id', $id_periodo)->first();
        
        $data=DB::select("SELECT * FROM datos_generales_estudiante,inscripciones,cursos,secciones WHERE datos_generales_estudiante.id=inscripciones.id_estudiante AND inscripciones.id_periodo=".$id_periodo." AND cursos.id=inscripciones.id_curso AND secciones.id=inscripciones.id_seccion AND datos_generales_estudiante.id=$id");
        foreach ($data as $key) {
            $datos['nombres'] = $key->nombres;
            $datos['apellido'] = $key->apellido_paterno;
            $datos['curso'] = $key->curso;
            $datos['periodo'] = $periodo->nombre;
        }
        
        $pdf = PDF::loadView('pdf.matricula.index', $datos);
        return $pdf->download('matricula.pdf');
    }

    public function listado_estudiantes_inscritos()
    {
        $id_periodo=Session::get('periodo');
        $periodo=Periodos::find($id_periodo);
        $estudiantes=DB::select("SELECT * FROM datos_generales_estudiante,inscripciones,cursos,secciones WHERE datos_generales_estudiante.id=inscripciones.id_estudiante AND inscripciones.id_periodo=".$id_periodo." AND cursos.id=inscripciones.id_curso AND secciones.id=inscripciones.id_seccion");

        return View('inscripciones.show',compact('estudiantes','periodo'));
    }
}
