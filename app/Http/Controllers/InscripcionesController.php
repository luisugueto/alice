<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Estudiante;
use App\Quimestrales;
use App\Cursos;
use AppSeccion;
use Session;
use DB;
use App\Rubros;
class InscripcionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantes=Estudiante::all();

        return view('inscripciones.index', compact('estudiantes'));
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
        $buscar=Quimestrales::where('id_estudiante',$id)->first();
        $estudiantes=Estudiante::find($id);
        $encontrado=count($buscar);
        $fecha_actual=date('Y-m-d');
        $sql="select fecha_nacimiento, YEAR('".$fecha_actual."') - YEAR(fecha_nacimiento) as edad FROM datos_generales_personal WHERE id = ".$id."";
        //dd($sql);
        $edad=DB::select($sql);

            if ($encontrado==0) {
                # es nuevo
                $estado="Nuevo Ingreso";
                $cursos=Cursos::lists('curso','id');
            
                return View('inscripciones.create',compact('estudiantes','cursos','estado','edad'));
            
            } else {
                $id_periodo_anterior = Session::get('periodo') - 1;
                # es regular
                $quimestres=DB::select('SELECT * FROM quimestrales,quimestres WHERE quimestrales.id_estudiante='.$id.' AND quimestrales.id_quimestre=quimestres.id AND quimestres.id_periodo='.$id_periodo.'')->get();
                $estado="Regular";
                    
                $buscar2=DB::select('SELECT * FROM inscripciones WHERE id='.$request->id_estudiante.' AND id_periodo='.$id_periodo.'');
            }

                


    }
    

    public function buscar($id)
    {
        return $seccion = Seccion::where('id_curso',$id)->get();  
    }

    public function buscarrubros($id){

        $id_periodo= Session::get('periodo');

        $rubros=Rubros::where('id_curso',$id)->where('id_periodo',$id_periodo)->get();
        
        return $rubros;
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
}
