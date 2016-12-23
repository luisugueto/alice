<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Estudiante;
use App\Quimestrales;
use App\Cursos;
use App\Seccion;
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
        $id_periodo=Session::get('periodo');
        $curso=Cursos::find($request->id_curso);
        $seccion=Seccion::find($request->id_seccion);
       
        $inscripciones=DB::insert("INSERT INTO inscripciones(id_estudiante,id_curso,id_seccion,id_periodo,becado) VALUES(".$request->id_estudiante.",".$request->id_curso.",".$request->id_seccion.",".$id_periodo.",'".$request->becado."')");
        
        $cuantos=count($request->id_rubro);

                if($cuantos>0){

                    for ($i=0; $i < $cuantos; $i++) { 
                        $facturar=DB::insert("INSERT INTO facturacion(id_estudiante,id_rubro) VALUES(".$request->id_estudiante.",".$request->id_rubro[$i].")");
                    }

                }
        Session::flash('message', 'ESTUDIANTE INSCRITO EXITOSAMENTE EN EL CURSO '.$curso->curso.' EN LA SECCIÓN '.$seccion->literal);   
        return redirect('inscripciones');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estudiantes=Estudiante::all();

        return View('inscripciones.show',compact('estudiantes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id_periodo = Session::get('periodo');
        $buscar=Quimestrales::where('id_estudiante',$id)->first();
        $estudiantes=Estudiante::find($id);
        $encontrado=count($buscar);
        $fecha_actual=date('Y-m-d');
        $sql="select fecha_nacimiento, YEAR('".$fecha_actual."') - YEAR(fecha_nacimiento) as edad FROM datos_generales_personal WHERE id = ".$id."";
        //dd($sql);
        $edad=DB::select($sql);

            if ($encontrado==0) {
                # es nuevo
                $inscripto=DB::select('SELECT * FROM inscripciones WHERE id_estudiante='.$id.' AND id_periodo='.$id_periodo);
                $listo=count($inscripto);
                if ($listo>0) {
                    Session::flash('message-error', 'DISCULPE, ESTE ESTUDIANTE YA SE ENCUENTRA INSCRITO EN EL PPERIODO LECTIVO ACTUAL');   

                    return redirect('inscripciones');
                }else{
                
                $estado="Nuevo Ingreso";
                $cursos=Cursos::lists('curso','id');
            
                return View('inscripciones.create',compact('estudiantes','cursos','estado','edad'));
                }
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
