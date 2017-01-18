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
use App\Seccion;
use App\Quimestrales;
use App\Calificacion_quimestre;
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
            $quimestre=Quimestres::where('id_periodo',$id_periodo)->get();
            foreach ($quimestre as $q) {

                $parciales=Parciales::where('id_quimestre',$q->id)->where('id_estudiante',$request->id_estudiante)->get();
                
                $cc+=count($parciales);

            }
     
            if(count($quimestre)>0){
                

                //buscando el ultimo parcial registrado para el estudiante:
                if($cc==0){
                    $cargadas=0;
                    $mias=0;
                    $quimestre=Quimestres::where('numero',1)->where('id_periodo',$id_periodo)->first();
                    $id_quimestre=$quimestre->id;
                }else{

                    foreach ($quimestre as $q) {
                    
                $ultimo=Parciales::where('id_quimestre',$q->id)->where('id_estudiante',$request->id_estudiante)->get();
                   $p=count($ultimo);
                        foreach ($ultimo as $last) {
                            
                        
                            $mias=bucar_mis_asignaturas_cargadas($request->id_estudiante,$last->id,$q->id);
                            $cargadas=buscando_asignaturas_cargadas2($request->id_estudiante,$last->id,$q->id);
                            //dd($mias);
                            if($mias==0){
                                //buscando las asignaturas cargadas
                                
                                
                                $id_quimestre=$q->id;
                                $mias=0;
                                $laster=Parciales::find($last->id);
                                break;

                            }
                            else{
                                $id_quimestre=$q->id;
                            }
                        }

                    }

                              
                                

                }

                //buscando la cantidad de asignaturas que ve el estudiante
                
                $cuantas=buscando_asignaturas_cursadas($request->id_estudiante);
                



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

                    // buscando al profesor que registra la calificacion
                    /*    $id_personal=personal();*/
                    //dd($cargadas."-".$cuantas."-".$mias);
                        
                                if (($cargadas==0 || $cargadas==$cuantas) && $mias==0 || $mias==1) {
                                 $subidas=count($request->id_asignatura);
                            $parcial=Parciales::create(['id_estudiante' => $request->id_estudiante,/*
                                                         'id_personal' => $request->id_personal,*/
                                                         'id_quimestre' => $id_quimestre,
                                                         'id_comportamiento' => $request->promedio_comp,
                                                         'faltas_j' => $request->faltas[0],
                                                         'faltas_i' => $request->faltas[1],
                                                         'atrasos_j' => $request->faltas[2],
                                                         'atrasos_i' => $request->faltas[3],
                                                         'observaciones' => $request->observaciones,
                                                         'avg_aprovechamiento' => $request->promedio_ap2]);
                            //buscando el ultimo registro para tomar el id del parcial
                            
                            $id_parcial=DB::getPdo()->lastInsertId();
                            $parcial2=Parciales::find($id_parcial);

                                } else {
                                    
                                        //si cuantos es menor que cuantas indica que ya se ha creado un parcial para ese estudiante
                                        //se busca el parcial creado
                                        $parcial2=Parciales::find($laster->id);
                                        //se actualizan los registros del parcial
                                            $parcial2->faltas_j=$parcial2->faltas_j+$request->faltas[0];
                                            $parcial2->faltas_i=$parcial2->faltas_i+$request->faltas[1];
                                            $parcial2->atrasos_j=$parcial2->atrasos_j+$request->faltas[2];
                                            $parcial2->atrasos_i=$parcial2->atrasos_i+$request->faltas[3];
                                            $parcial2->save();
                                                                          
                            
                                         }


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
                //calculando nuevo promedio de aprovechamiento
                //
                $subtotal=Calificacion_parcial_subtotal::where('id_parcial',$parcial2->id)->get();
                $cargadas=buscando_asignaturas_cargadas2($request->id_estudiante,$parcial2->id,$id_quimestre);
                //dd($cargadas);
                $suma=0;
                foreach ($subtotal as $sub) {
                    $suma+=$sub->avg_total;
                }
                $promedio=$suma/$cargadas;
                $parcial2->avg_aprovechamiento=$promedio;
                $parcial2->save();

                 
                     Session::flash('message', 'CALIFICACIONES DEL PARCIAL REGISTRADAS EXITOSAMENTE');
                     return redirect(route('parciales.index'));
        }
            }else{
                        Session::flash('message-error', 'NO SE HA REGISTRADO NINGÚN QUIMESTRE PARA ESTE PERIODO ESCOLAR');
                     return redirect(route('parciales.index'));       
            }
    }

    public function store2(Request $request){

        //buscando id del quimestre
        $cc=0;
        $id_periodo=Session::get('periodo');
            $quimestre=Quimestres::where('id_periodo',$id_periodo)->get();
            //dd(count($quimestre));
            foreach($quimestre as $q) {
                $quimestral=Quimestrales::where('id_quimestre',$q->id)->where('id_estudiante',$request->id_estudiante)->get();
                //dd(count($quimestral));
                $cc+=count($quimestral);

            }

             if(count($quimestre)>0){


          //buscando el ultimo parcial registrado para el estudiante:
                if($cc==0){
                    $cargadas=0;
                    $mias=0;
                    $quimestre=Quimestres::where('numero',1)->where('id_periodo',$id_periodo)->first();
                    $id_quimestre=$quimestre->id;
                }else{

                    foreach ($quimestre as $q) {
                    
                $ultimo=Quimestrales::where('id_quimestre',$q->id)->where('id_estudiante',$request->id_estudiante)->get();
                   //dd($ultimo);
                        foreach ($ultimo as $last) {
                            
                        
                            $mias=buscar_mis_asignaturas_cargadas_q($request->id_estudiante,$last->id,$q->id);
                            //dd($mias);
                            if($mias==0){
                                //buscando las asignaturas cargadas
                                
                                $cargadas=buscando_asignaturas_cargadas2_q($request->id_estudiante,$last->id,$q->id);
                                $id_quimestre=$q->id;
                                //dd($id_quimestre);
                                $mias=0;
                                $laster=Quimestrales::find($last->id);
                                break;

                            }
                        }

                    }

                }

         $cuantas=buscando_asignaturas_cursadas($request->id_estudiante);
                    $cont=0;
                for ($i=0; $i <count($request->avg_q_cualitativa2) ; $i++) { 
                    if($request->avg_q_cualitativa2[$i]==""){
                        $cont++;
                    }
                }
             if($cont>0){
                     Session::flash('message-error', 'DEBE GREGAR TODAS LAS CALIFICACIONES');
                     return redirect()->back();

            }else{

                        if (($cargadas==0 || $cargadas==$cuantas) && $mias==0 || $mias==1) {

                            $subidas=count($request->id_asignatura);
                            $parcial=Quimestrales::create(['id_estudiante' => $request->id_estudiante,
                                                         'id_quimestre' => $id_quimestre,
                                                         'total_faltas_j' => $request->total_faltas_j,
                                                         'total_faltas_i' => $request->total_faltas_i,
                                                         'total_atrasos_j' => $request->total_atrasos_j,
                                                         'total_atrasos_i' => $request->total_atrasos_i,
                                                         'sumatoria' => $request->sumatoria2,
                                                         'avg_aprovechamiento_q' => $request->avg_aprovechamiento_q2,
                                                         'id_comportamiento' => $request->promedio_comp,
                                                         'observaciones' => $request->observaciones,
                                                         'recomendaciones' => $request->recomendaciones]);
                            //buscando el ultimo registro para tomar el id del parcial
                            
                            $id_quimestral=DB::getPdo()->lastInsertId();
                            $quimestral2=Quimestrales::find($id_quimestral);
                        }else{

                            //si cuantos es menor que cuantas indica que ya se ha creado un parcial para ese estudiante
                                        //se busca el parcial creado
                                        $quimestral2=Quimestrales::find($laster->id);
                                        //se actualizan los registros del parcial
                                            
                                            $quimestral2->total_faltas_j=$quimestral2->total_faltas_j+$request->total_faltas_i;
                                            $quimestral2->total_faltas_i=$quimestral2->total_faltas_i+$request->total_faltas_j;
                                            $quimestral2->total_atrasos_j=$quimestral2->total_atrasos_j+$request->total_atrasos_j;
                                            $quimestral2->total_atrasos_i=$quimestral2->total_atrasos_i+$request->total_atrasos_i;
                                            $quimestral2->sumatoria=$request->sumatoria2;

                                            $quimestral2->save();
                        }

                         $final=count($request->id_asignatura);
                         for ($j=0; $j < $final ; $j++) {

                            $equivalencia=Equivalencias::where('literales',$request->avg_q_cualitativa2[$j])->first();

                            $calificacion=Calificacion_quimestre::create(['id_quimestrales' => $quimestral2->id,
                                                                         'id_asignatura' => $request->id_asignatura[$j],
                                                                         'avg_gp' => $request->avg_gp[$j],
                                                                         'avg_gp80' => $request->avg_gp80[$j],
                                                                         'examen_q' => $request->examen_q[$j],
                                                                         'examen_q20' => $request->examen_q20[$j],
                                                                         'avg_q_cuantitativa' => $request->avg_q_cuantitativa2[$j],
                                                                         'id_equivalencia' => $equivalencia->id]);

                         }

                         //calculando nuevo promedio de aprovechamiento
                //
                $subtotal=Calificacion_quimestre::where('id_quimestrales',$quimestral2->id)->get();
                $cargadas=buscando_asignaturas_cargadas2_q($request->id_estudiante,$quimestral2->id,$id_quimestre);
                //dd($cargadas);
                $suma=0;
                foreach ($subtotal as $sub) {
                    $suma+=$sub->avg_q_cuantitativa;
                }
                $promedio=$suma/$cargadas;
                $quimestral2->avg_aprovechamiento_q=$promedio;
                $quimestral2->save();




                     Session::flash('message', 'CALIFICACIONES DEL QUIMESTRE REGISTRADAS EXITOSAMENTE');
                     return redirect(route('parciales.index'));
                }
            }else{
                        Session::flash('message-error', 'NO SE HA REGISTRADO NINGÚN QUIMESTRE PARA ESTE PERIODO ESCOLAR');
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


            if (Auth::user()->roles_id == 5 || Auth::user()->roles_id == 1) {

            $estudiantes=Estudiante::all();

            Session::flash('message', 'CARGA DE PARCIALES CON NIVEL ADMIN');

            return view('parciales.show-all',compact('estudiantes','periodo'));
        

            }else{
               
        $cuantos_q=buscar_quimestre($id);
        $estudiantes=Estudiante::find($id);

        $id_curso=buscar_curso($id);

        
        /*$parciales=Parciales::where('id_estudiante',$estudiantes->id)->where('id_personal',$id_prof)->get();*/
        $parciales=Parciales::where('id_estudiante',$estudiantes->id)->get();
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

    public function asignaturas(){

        $correo=Auth::user()->email;
        $personal=Personal::where('correo',$correo)->first();
        $id_periodo=Session::get('periodo');
        $periodo=Periodos::find($id_periodo);
       /* dd($personal->asignaturas);*/

       $asignaturas=DB::select("SELECT * FROM asignacion,asignaturas,secciones,cursos WHERE id_prof=".$personal->id." AND id_periodo=".$id_periodo." AND asignaturas.id=asignacion.id_asignatura AND asignacion.id_seccion=secciones.id AND secciones.id_curso=cursos.id");

        return View('parciales.asignaturas',compact('personal','periodo','asignaturas'));

    }

    public function estudiantes($id_seccion){

        $seccion=Seccion::find($id_seccion);
        $id_periodo=Session::get('periodo');
        $periodo=Periodos::find($id_periodo);


        $estudiantes=DB::select("SELECT datos_generales_estudiante.* FROM 
            datos_generales_estudiante,secciones,cursos,inscripciones WHERE 
            inscripciones.id_estudiante = datos_generales_estudiante.id AND
            inscripciones.id_seccion = secciones.id AND 
            secciones.id_curso= cursos.id AND 
            inscripciones.id_seccion= ".$id_seccion);

        //dd($estudiantes);
        return View('parciales.estudiantes',compact('seccion','estudiantes','periodo'));

    }

    public function mostrarcalificaciones(){

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
                    return View('parciales.calificaciones_cargadas',compact('docente','docentes','periodo','estudiantes'));
                
                }
                
            }

            if($contador==0){
               // Session::flash('message-error', 'DISCULPE, USTED NO PUEDE REALIZAR CARGA DE CALIFICACIONES');
                 return View('home');
            }
       

    }

    public function showcalificacionesparcial($i,$id_estudiante){

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
                   
                
                }
                
            }


        $estudiantes=Estudiante::find($id_estudiante);
        $id_curso=buscar_curso($id_estudiante);
        $promedio_comp=Comportamiento::lists('literal','id');

        
        $asignaturas=Asignaturas::where('id_curso',$id_curso)->get();
        $categorias=Categorias_parcial::all();

        $sql="SELECT * FROM parciales, calificacion_parcial,quimestres,asignaturas WHERE 
                        id_estudiante=".$id_estudiante." AND 
                        asignaturas.id=calificacion_parcial.id_asignatura AND            
                        quimestres.id=parciales.id_quimestre AND 
                        quimestres.id_periodo=".$id_periodo." AND 
                        calificacion_parcial.id_parcial=parciales.id ";
                        //dd($sql);
        
        $buscar2=DB::select($sql);



        return View('parciales.mostrar-parcial',compact('asignaturas','id_curso','estudiantes','docentes','categorias','buscar2','promedio_comp'));

    }

    public function coordinacion(){
    
        $id_periodo= Session::get('periodo');
        $correo=Auth::user()->email;
        $docentes=Personal::where('correo',$correo)->first();
        //dd($docentes);
      

            //$docentes=Personal::find($id);
            $sql='SELECT secc.id,secc.literal,cursos.curso FROM asignacion_coordinador ac INNER JOIN secciones secc ON ac.id_seccion = secc.id INNER JOIN cursos ON secc.id_curso=cursos.id WHERE ac.id_prof='.$docentes->id.' AND ac.id_periodo='.$id_periodo;
                //dd($sql);
            $docentes2 = DB::select(DB::raw($sql));
                $cuantos=count($docentes2);
                //dd($docentes->secciones_coordinacion);
                if($cuantos==0){                   
                    return View('parciales.show2',compact('cuantos','docentes'));
                }else{
                    return View('parciales.show2',compact('docentes','cuantos','docentes2'));
                }
            
        
    }

    public function buscarestudiantes($id){

        $id_periodo= Session::get('periodo');
        $periodo = Periodos::find($id_periodo);
        $sql="SELECT datos_generales_estudiante.*,inscripciones.id_curso FROM inscripciones,datos_generales_estudiante WHERE inscripciones.id_seccion=".$id." AND inscripciones.id_periodo=".$id_periodo." AND inscripciones.id_estudiante=datos_generales_estudiante.id";

        $buscar =DB::select($sql);

        return View('parciales.show-estudiantes',compact('buscar','periodo'));    

    }

    public function show_rectificar_parcial($id_parcial){

            $id_periodo=Session::get('periodo');

            $parcial = Parciales::find($id_parcial);
            //buscando la seccion del estudiante
            $sql="SELECT * FROM inscripciones WHERE id_estudiante=".$parcial->id_estudiante." AND id_periodo=".$id_periodo;
            $estudiante=DB::select($sql);
            //buscando las asginaturas del docente
            
            $correo=Auth::user()->email;

            $docente=Personal::where('correo',$correo)->first();

            foreach ($estudiante as $est) {
            $mis_asignaturas=DB::select("SELECT * FROM asignacion WHERE id_prof=".$docente->id." AND id_seccion=".$est->id_seccion);    
            }
            //dd($mis_asignaturas);
            $asignaturas=Asignaturas::all();
            
            
        //buscando categorias
            $categorias=Categorias_parcial::lists('categoria','id');
            
        return View('parciales.show-rectificar-parcial',compact('parcial','asignaturas','categorias','mis_asignaturas'));


    }

    public function rectificacion(Request $request)
    {
            $id_periodo=Session::get('periodo');
            //primero verificar si tiene quimestres registrados para este periodo
            $buscar=Quimestrales::where('id_estudiante',$request->id_estudiante)->get();

            $q=count($buscar);

            if ($q==0) {
                //en caso de no tener ningun quimestral registrado solo se hace la actualización y 
                //cálculo del nuevo promedio del parcial
                
                $calificaciones=Calificacion_parcial::where('id_parcial',$request->id_parcial)->where('id_categoria',$request->id_categoria)->where('id_asignatura',$request->id_asignatura)->first();
                //dd($calificaciones);
                //actualizar calificacion
                $calificaciones->calificacion=$request->calificacion;
                $calificaciones->save();
                //actualizar promedio de la asignatura
                $cal=Calificacion_parcial::where('id_parcial',$request->id_parcial)->where('id_asignatura',$request->id_asignatura)->get();
                    $suma=0;
                    foreach ($cal as $c) {
                        $suma+=$c->calificacion;
                    }
                $nuevo_avg=$suma/5;
                $cal2=Calificacion_parcial_subtotal::where('id_parcial',$request->id_parcial)->where('id_asignatura',$request->id_asignatura)->first();
                $cal2->avg_total=$nuevo_avg;
                 //----- actualizando caificacion cualitativa de la asignatura
                         if($nuevo_avg>=9 AND $nuevo_avg<=10){
                            $cal2->id_equivalencia=1;
                         }
                         if($nuevo_avg>=7 AND $nuevo_avg<9){
                            $cal2->id_equivalencia=2;
                         }
                         if($nuevo_avg>4 AND $nuevo_avg<7){
                            $cal2->id_equivalencia=3;
                         }
                         if($nuevo_avg>=1 AND $nuevo_avg<=4){
                            $cal2->id_equivalencia=4;
                         }
                         //----------------------------------------
                $cal2->save();
                //actualizando promedio del parcial
                $cal3=Calificacion_parcial_subtotal::where('id_parcial',$request->id_parcial)->get();
                    $suma2=0;
                    $cuantos=count($cal3);
                    foreach ($cal3 as $c3) {
                        $suma2+=$c3->avg_total;
                    }
                    $nuevo_avg_parcial=$suma2/$cuantos;
                        $parcial=Parciales::find($request->id_parcial);
                        $parcial->avg_aprovechamiento=$nuevo_avg_parcial;
                        $parcial->save();




            } else {
                    //-------------------------------------------------------------------------

                //en caso de no tener ningun quimestral registrado solo se hace la actualización y 
                //cálculo del nuevo promedio del parcial
                
                $calificaciones=Calificacion_parcial::where('id_parcial',$request->id_parcial)->where('id_categoria',$request->id_categoria)->where('id_asignatura',$request->id_asignatura)->first();
                //dd($calificaciones);
                //actualizar calificacion
                $calificaciones->calificacion=$request->calificacion;
                $calificaciones->save();
                //actualizar promedio de la asignatura
                $cal=Calificacion_parcial::where('id_parcial',$request->id_parcial)->where('id_asignatura',$request->id_asignatura)->get();
                    $suma=0;
                    foreach ($cal as $c) {
                        $suma+=$c->calificacion;
                    }
                $nuevo_avg=$suma/5;
                $cal2=Calificacion_parcial_subtotal::where('id_parcial',$request->id_parcial)->where('id_asignatura',$request->id_asignatura)->first();
                $cal2->avg_total=$nuevo_avg;
                //----- actualizando caificacion cualitativa de la asignatura
                         if($nuevo_avg>=9 AND $nuevo_avg<=10){
                            $cal2->id_equivalencia=1;
                         }
                         if($nuevo_avg>=7 AND $nuevo_avg<9){
                            $cal2->id_equivalencia=2;
                         }
                         if($nuevo_avg>4 AND $nuevo_avg<7){
                            $cal2->id_equivalencia=3;
                         }
                         if($nuevo_avg>=1 AND $nuevo_avg<=4){
                            $cal2->id_equivalencia=4;
                         }
                         //----------------------------------------
                $cal2->save();
                //actualizando promedio del parcial
                $cal3=Calificacion_parcial_subtotal::where('id_parcial',$request->id_parcial)->get();
                    $suma2=0;
                    $cuantos=count($cal3);
                    foreach ($cal3 as $c3) {
                        $suma2+=$c3->avg_total;
                    }
                        $nuevo_avg_parcial=$suma2/$cuantos;
                        $parcial=Parciales::find($request->id_parcial);
                        $parcial->avg_aprovechamiento=$nuevo_avg_parcial;
                        $parcial->save();

                    //-------------------------------------------------------------------------

                //en caso de tener quimestres registrados
                //verificar cuantos quimestres tiene
                //verificar el numero del parcial primero
                $quimestres=Quimestres::where('id_periodo',$id_periodo)->get();
                foreach ($quimestres as $q) {
                    $parciales=Parciales::where('id_quimestre',$q->id)->where('id_estudiante',$request->id_estudiante)->get();
                            $i=0;
                        foreach ($parciales as $p) {
                            $i++;
                             if($parciales->id==$request->id_parcial){
                                    $posicion=$i;
                                    break;
                             }
                         } 
                }
                //ya encontrada la posicion determinar que quimestre se debe actualizar
                if ($posicion<=3) {
                    //en este caso el parcial corresponde al primer quimestre
                   $id_quimestre=$quimestres=Quimestres::where('id_periodo',$id_periodo)->first();

                } else {
                    // en este caso el parcial corresponde al segundo quimestre
                    $id_quimestre=$quimestres=Quimestres::where('id_periodo',$id_periodo)->last();

                }
                    $parciales2=Calificacion_parcial_subtotal::where('id_parcial',$request->id_parcial)->where('id_asignatura',$request->id_asignatura)->get();
                    $suma3=0;
                        //calculando nuevo promedio de los parciales
                        foreach ($parciales2 as $p2) {
                            $suma3+=$p2->avg_total;
                        }
                        $nuevo_avg_gp=$suma3/3;
                        $nuevo_avg_gp80=$nuevo_avg_gp*80/100;


                        $quimestral=Quimestrales::where('id_estudiante',$request->id_estudiante)->where('id_quimestre',$id_quimestre)->first();

                        $calq=Calificacion_quimestre::where('id_quimestrales',$quimestral->id)->where('id_asignatura',$request->id_asignatura)->first();

                        $calq->avg_gp=$nuevo_avg_gp;
                        $calq->avg_gp80=$nuevo_avg_gp80;
                        $nuevo_avg_q_cuantitativa=$calq->examen_q20+$nuevo_avg_gp80;
                        $calq->avg_q_cuantitativa=$nuevo_avg_q_cuantitativa;

                        //----- actualizando caificacion cualitativa de la asignatura
                         if($nuevo_avg_q_cuantitativa>=9 AND $nuevo_avg_q_cuantitativa<=10){
                            $calq->id_equivalencia=1;
                         }
                         if($nuevo_avg_q_cuantitativa>=7 AND $nuevo_avg_q_cuantitativa<9){
                            $calq->id_equivalencia=2;
                         }
                         if($nuevo_avg_q_cuantitativa>4 AND $nuevo_avg_q_cuantitativa<7){
                            $calq->id_equivalencia=3;
                         }
                         if($nuevo_avg_q_cuantitativa>=1 AND $nuevo_avg_q_cuantitativa<=4){
                            $calq->id_equivalencia=4;
                         }
                         //---------------------------------------------------------
                         $calq->save();
                    

                
                
                
            }//fin del else de si existen quimestres registrados
            
            Session::flash('message', 'CALIFICACIÓN CORREGIDA EXITOSAMENTE');
                     return redirect(route('parciales.index'));            


    }


}
