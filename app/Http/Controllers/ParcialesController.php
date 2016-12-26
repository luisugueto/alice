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
use App\Quimestres;
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
        
        //buscando id del quimestre
        $cc=0;
        $id_periodo=Session::get('periodo');
            $quimestre=Quimestres::where('id_periodo',$id_periodo);
            foreach ($quimestre as $q) {
                $parciales=Parciales::where('id_quimestre',$q->id);
                
                $cc++;


            }
            
            if($cc<3){
                    $quimestre2=Quimestres::where('numero',1)->first();
                }else{
                    $quimestre2=Quimestres::where('numero',2)->first();
                }




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

               
                    $parcial=Parciales::create(['id_estudiante' => $request->id_estudiante,
                                                 'id_personal' => $request->id_personal,
                                                 'id_quimestre' => $quimestre2->id,
                                                 'id_comportamiento' => $request->promedio_comp,
                                                 'faltas_j' => $request->faltas[0],
                                                 'faltas_i' => $request->faltas[1],
                                                 'atrasos_j' => $request->faltas[2],
                                                 'atrasos_i' => $request->faltas[3],
                                                 'observaciones' => $request->observaciones,
                                                 'avg_aprovechamiento' => $request->promedio_ap2]);
                    $parcial2=Parciales::all()->last();
                        //cargando la  categoria deberes
                        $categoria1=Categorias_parcial::where('categoria','Deberes')->first();
                        $final=count($request->id_asignatura);
                 for ($j=0; $j < $final ; $j++) {

                    $calificacion=Calificacion_parcial::create(['id_parcial' => $parcial2->id,
                                                                 'id_asignatura' => $request->id_asignatura[$j],
                                                                 'id_categoria' => $categoria1->id,
                                                                 'calificacion' => $request->deberes[$j]]);

                 }
                 //cargando la categoria Actividades Individuales

                       $categoria2=Categorias_parcial::where('categoria','Actividades Individuales')->first();
                 for ($j=0; $j < count($request->id_asignatura) ; $j++) {

                    $calificacion=Calificacion_parcial::create(['id_parcial' => $parcial2->id,
                                                                 'id_asignatura' => $request->id_asignatura[$j],
                                                                 'id_categoria' => $categoria2->id,
                                                                 'calificacion' => $request->individuales[$j]]);

                 }

                 //cargando la categoria Actividades Grupales

                       $categoria3=Categorias_parcial::where('categoria','Actividades Grupales')->first();
                 for ($j=0; $j < count($request->id_asignatura) ; $j++) {

                    $calificacion=Calificacion_parcial::create(['id_parcial' => $parcial2->id,
                                                                 'id_asignatura' => $request->id_asignatura[$j],
                                                                 'id_categoria' => $categoria3->id,
                                                                 'calificacion' => $request->grupales[$j]]);

                 }
                 //cargando la categoria Lecciones

                       $categoria4=Categorias_parcial::where('categoria','Lecciones')->first();
                 for ($j=0; $j < count($request->id_asignatura) ; $j++) {

                    $calificacion=Calificacion_parcial::create(['id_parcial' => $parcial2->id,
                                                                 'id_asignatura' => $request->id_asignatura[$j],
                                                                 'id_categoria' => $categoria4->id,
                                                                 'calificacion' => $request->lecciones[$j]]);

                 }

                 //cargando la categoria Aportes

                       $categoria5=Categorias_parcial::where('categoria','Aporte')->first();
                 for ($j=0; $j < count($request->id_asignatura) ; $j++) {

                    $calificacion=Calificacion_parcial::create(['id_parcial' => $parcial2->id,
                                                                 'id_asignatura' => $request->id_asignatura[$j],
                                                                 'id_categoria' => $categoria5->id,
                                                                 'calificacion' => $request->aportes[$j]]);

                 }

                 //cargando calificaciones totales
                 
                  for ($j=0; $j < count($request->id_asignatura) ; $j++) {

                    $equivalencia=Equivalencias::where('literales',$request->cualitativa2[$j])->first();

                    $calificacion=Calificacion_parcial_subtotal::create(['id_parcial' => $parcial2->id,
                                                                 'id_asignatura' => $request->id_asignatura[$j],
                                                                 'avg_total' => $request->promedio2[$j],
                                                                 'id_equivalencia' => $equivalencia->id]);
                    }

                 
                     Session::flash('message', 'CALIFICACIONES REGISTRADAS EXITOSAMENTE');
                     return redirect(route('parciales.index'));
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
          $personal=Personal::all();
            $correo=Auth::user()->email;
            $id_periodo=Session::get('periodo');
            $periodo=Periodos::find($id_periodo);
            $contador=0;
            foreach ($personal as $personal) {

                
                if($correo==$personal->correo){
                    $docente=Personal::find($personal->id);
                    $id_prof=$docente->id;
                    //dd($id_prof);


                    $sql2="SELECT * FROM asignacion WHERE id_prof=".$personal->id." AND id_periodo=".$id_periodo."";
                    //dd($sql2);
                    $docentes=DB::select($sql2);
                
                }
                
            }



        
        $estudiantes=Estudiante::find($id);
        $id_curso=buscar_curso($id);
        
        $parciales=Parciales::where('id_estudiante',$estudiantes->id)->where('id_personal',$id_prof)->get();
        //dd($parciales);
        $parciales_asignatura=Calificacion_parcial_subtotal::all();
        
        $asignaturas=Asignaturas::where('id_curso',$id_curso)->get();
        $categorias=Categorias_parcial::all();
        $equivalencias=Equivalencias::all();
        $comportamiento=Comportamiento::all();
        $promedio_comp=Comportamiento::lists('literal','id');   
        $quimestres=Quimestres::find(1);
        return View('parciales.quimestres',compact('parciales_asignatura','docentes','parciales','quimestres','estudiantes','asignaturas','categorias','equivalencias','comportamiento','promedio_comp'));
    
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
