<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Asignaturas;
use App\Categorias_parcial;
use App\Equivalencias;
use App\Comportamiento;
use Auth;
use App\Estudiante;
use App\Personal;
use Session;
use App\Periodos;
use DB;
use App\Http\helpers;
use App\Parciales;
use App\Calificacion_parcial_subtotal;
use App\Calificacion_parcial;
class ParcialesController extends Controller
{
    public function __construct(){
        /*if(Auth::user()->roles_id == 5){
            $this->middleware('dace');
        }
        elseif(Auth::user()->roles_id == 3){
            $this->middleware('profesor');
        }
        else{
            $this->middleware('administrador');
        }*/
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
            
            $personal=Personal::all();
            $correo=Auth::user()->email;
            $id_periodo=Session::get('periodo');
            $periodo=Periodos::find($id_periodo);
            $contador=0;
            foreach ($personal as $personal) {

                
                if($correo==$personal->correo){

                    $docente=Personal::find($personal->id);
                    $sql2="SELECT * FROM asignacion WHERE id_prof=".$personal->id." AND id_periodo=".$id_periodo." GROUP BY id_seccion";
                    //dd($sql2);
                    $docentes=DB::select($sql2);
                    $sql="SELECT inscripciones.*,datos_generales_estudiante.*,cursos.curso,cursos.id AS id_curso,secciones.literal FROM cursos,secciones, inscripciones,datos_generales_estudiante WHERE inscripciones.id_seccion=secciones.id AND inscripciones.id_curso=cursos.id AND inscripciones.id_estudiante=datos_generales_estudiante.id AND inscripciones.id_periodo=".$id_periodo." ";
                   //dd($sql);
                   $estudiantes=DB::select($sql);


                    $contador++;
                        //dd($docente->asignaturas);
                    return View('parciales.index',compact('docente','docentes','periodo','estudiantes'));
                
                }
                
            }

            if($contador==0){
               // Session::flash('message-error', 'DISCULPE, USTED NO PUEDE REALIZAR CARGA DE CALIFICACIONES');
                 return View('home');
            }
       
      

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cont=0;
        for ($i=0; $i <count($request->cualitativa2) ; $i++) { 
            if($request->cualitativa2[$i]==""){
                $cont++;
            }
        }

        if($cont>0){
                     Session::flash('message-error', 'DEBE GREGAR TODAS LAS CALIFICACIONES');
                     return redirect()->back();

        }else{

                for ($j=0; $j < count($request->id_asignatura) ; $j++) { 
                    $parcial=Parciales::create(['id_estudiante' => $request->id_estudiante,
                                                 'id_personal' => $request->id_personal,
                                                 'id_quimestre' => $request->id_quimestre,
                                                 'id_comportamiento' => $request->promedio_comp,
                                                 'faltas_j' => $request->faltas[0],
                                                 'faltas_i' => $request->faltas[1],
                                                 'atrasos_j' => $request->faltas[2],
                                                 'atrasos_i' => $request->faltas[3],
                                                 'observaciones' => $request->observaciones,
                                                 'avg_aprovechamiento' => 0]);
                }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estudiantes=Estudiante::find($id);
        $id_curso=buscar_curso($id);

        $asignaturas=Asignaturas::where('id_curso',$id_curso)->get();
        $categorias=Categorias_parcial::all();
        $equivalencias=Equivalencias::all();
        $comportamiento=Comportamiento::all();
        $promedio_comp=Comportamiento::lists('literal','id');
        return View('parciales.create',compact('estudiantes','asignaturas','categorias','equivalencias','comportamiento','promedio_comp'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

            $personal=Personal::all();
            $correo=Auth::user()->email;
            $id_periodo=Session::get('periodo');
            $periodo=Periodos::find($id_periodo);
            $contador=0;
            foreach ($personal as $personal) {

                
                if($correo==$personal->correo){
                    $docente=Personal::find($personal->id);


                    $sql2="SELECT * FROM asignacion WHERE id_prof=".$personal->id." AND id_periodo=".$id_periodo."";
                    //dd($sql2);
                    $docentes=DB::select($sql2);
                
                }
                
            }



 
        $estudiantes=Estudiante::find($id);
        $id_curso=buscar_curso($id);

        
        $asignaturas=Asignaturas::where('id_curso',$id_curso)->get();
        $categorias=Categorias_parcial::all();
        $equivalencias=Equivalencias::all();
        $comportamiento=Comportamiento::all();
        $promedio_comp=Comportamiento::lists('literal','id');
        return View('parciales.create',compact('docentes','estudiantes','asignaturas','categorias','equivalencias','comportamiento','promedio_comp'));
    
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
