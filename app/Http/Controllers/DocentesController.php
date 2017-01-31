<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Personal;
use Auth;

use App\Cargo;
use DB;
use App\Cursos;
use App\Seccion;
use App\Asignaturas;
use Session;
class DocentesController extends Controller
{
    public function __construct(){
        /*if(Auth::user()->roles_id == 5){
            $this->middleware('dace');
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
        $docentes=Personal::all();
        return View('docentes.index',compact('docentes'));
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
        //dd($request->all());
        $id_periodo= Session::get('periodo');
        if($request->cargo=="DOCENTE DE PLANTA"){

                $buscar=Asignaturas::where('id_curso',$request->id_curso)->first();
                //dd($buscar->id);
                
                $buscar2=DB::select('SELECT * FROM asignacion WHERE id_seccion='.$request->id_seccion.' AND id_asignatura='.$buscar->id.' AND id_periodo='.$id_periodo.'');
                $cuantos=count($buscar2);
            if ($cuantos>0) {
                    Session::flash('message-error', 'DISCULPE, ESTA SECCIÓN DE ESTE CURSO YA SE ENCUENTRA ASIGNADA A UN DOCENTE');
            } else { 
                    //---- BUSCARNDO SI SE HAN CARGADO DE DICHA SECCION CALIFICACIONES
                    //BUSCANDO EN LA TABLA INSCRIPCIONES LA SECCION PARA VERIFICAR SI TIENE ESTUDIANTES INSCRITOS
                    $buscar3=DB::select("SELECT * FROM inscripciones WHERE id_seccion=".$request->id_seccion);
                    $n=count($buscar3);
                    $contar=0;
                            if($n>0){

                               
                                //BUSCANDO DE LOS ESTUDIANTES INSCRITOS SI SE LE HA CARGADO CALIFICACION
                                foreach($buscar3 as $b){
                                  
                                    $buscar4=DB::select("SELECT * FROM parciales WHERE id_estudiante=".$b->id_estudiante);
                                    $contar+=count($buscar4);
                                }

                            }

                    //--------------------------------------------------------------
                                if($contar==0){

                                $asignaturas=Asignaturas::where('id_curso',$request->id_curso)->get();
                                        foreach ($asignaturas as $asignaturas) {
                                            $asignacion=DB::insert('INSERT INTO asignacion(id_prof,id_asignatura,id_seccion,id_periodo) VALUES('.$request->id_prof.','.$asignaturas->id.','.$request->id_seccion.','.$id_periodo.')');

                                        }
                                Session::flash('message', 'CURSO Y SECCIÓN ASIGNADA EXITOSAMENTE');
                                }else{

                                Session::flash('message-error', 'LA SECCION NO PUEDE SER ASIGNADA DEBIDO A QUE YA SE LES HA CARGADO CALIFICACIONES A UN ESTUDIANTE DE DICHA SECCION');
                                }
                        
            }

        }else{
                //dd($request->all());   
                $buscar2=DB::select('SELECT * FROM asignacion WHERE id_seccion='.$request->id_seccion2.' AND id_asignatura='.$request->id_asignatura.' AND id_periodo='.$id_periodo.'');

                $cuantos=count($buscar2);
            if ($cuantos>0) {
                    Session::flash('message-error', 'DISCULPE, ESTA ESTA ASIGNATURA Y SECCIÓN DE ESTE CURSO YA SE ENCUENTRA ASIGNADA A UN DOCENTE');
            } else { 

                //---- BUSCARNDO SI SE HAN CARGADO DE DICHA SECCION CALIFICACIONES
                    //BUSCANDO EN LA TABLA INSCRIPCIONES LA SECCION PARA VERIFICAR SI TIENE ESTUDIANTES INSCRITOS
                    $sql="SELECT * FROM asignacion INNER JOIN inscripciones ON asignacion.id_seccion=inscripciones.id_seccion INNER JOIN asignaturas ON asignaturas.id=asignacion.id_asignatura INNER JOIN secciones ON secciones.id_curso=asignaturas.id_curso WHERE secciones.id=".$request->id_seccion2." AND asignacion.id_prof=".$request->id_prof."";
                    //dd($sql);
                    $buscar3=DB::select($sql);
                    $n=count($buscar3);
                    $contar=0;
                            if($n>0){

                               
                                //BUSCANDO DE LOS ESTUDIANTES INSCRITOS SI SE LE HA CARGADO CALIFICACION
                                foreach($buscar3 as $b){

                                    $buscar4=DB::select("SELECT * FROM parciales,calificacion_parcial WHERE parciales.id_estudiante=".$b->id_estudiante." AND calificacion_parcial.id_asignatura=".$b->id_asignatura);
                                    $contar+=count($buscar4);
                                }

                            }

                    //--------------------------------------------------------------
                    
                    if($contar==0){

                    
                        $asignacion=DB::insert('INSERT INTO asignacion(id_prof,id_asignatura,id_seccion,id_periodo) VALUES('.$request->id_prof.','.$request->id_asignatura.','.$request->id_seccion2.','.$id_periodo.')');

                    
                    Session::flash('message', 'CURSO, SECCIÓN Y ASIGNATURA ASIGNADA EXITOSAMENTE');
                    }else{

                         Session::flash('message-error', 'LA SECCION NO PUEDE SER ASIGNADA DEBIDO A QUE YA SE LES HA CARGADO CALIFICACIONES A UN ESTUDIANTE DE DICHA SECCION');
                    }
            }

        }
         $docentes=Personal::all();
        return View('docentes.index',compact('docentes'));
    }

    public function store2(Request $request)
    {
        $id_periodo= Session::get('periodo');
        
                
                $buscar2=DB::select('SELECT * FROM asignacion_coordinador WHERE id_seccion='.$request->id_seccion.' AND id_periodo='.$id_periodo.'');
                $cuantos=count($buscar2);
            if ($cuantos>0) {
                    Session::flash('message-error', 'DISCULPE, ESTA SECCIÓN DE ESTE CURSO YA SE ENCUENTRA ASIGNADA A UN DOCENTE COMO COORDINADOR');
            } else { 

                    $asignacion=DB::insert('INSERT INTO asignacion_coordinador(id_prof,id_seccion,id_periodo) VALUES('.$request->id_prof.','.$request->id_seccion.','.$id_periodo.')');

                    Session::flash('message', 'CURSO Y SECCIÓN ASIGNADA EXITOSAMENTE PARA COORDINACIÓN');
            }

        
         $docentes=Personal::all();
        return View('docentes.index',compact('docentes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id_periodo= Session::get('periodo');
        $docentes=Personal::find($id);
        //dd($docentes);
        if ($docentes->cargo->nombre=="DOCENTE DE PLANTA") {

            $docentes2 = DB::select(DB::raw('select * from asignacion,cursos,secciones where id_periodo='.$id_periodo.' AND asignacion.id_prof='.$id.' AND cursos.id = secciones.id_curso AND secciones.id = asignacion.id_seccion group by secciones.id_curso'));
            
        
        return View('docentes.show',compact('docentes','docentes2'));
            
        } else {

            $docentes=Personal::find($id);
            $docentes2 = DB::select(DB::raw('select * from asignacion where id_periodo='.$id_periodo.' AND id_prof='.$id.' group by id_asignatura'));
                //dd($docentes2);
                $cuantos=count($docentes2);

                if($cuantos==0){                   
                    return View('docentes.show',compact('cuantos','docentes'));
                }else{
                  //$docentes = DB::select(DB::raw('select * from asignacion where id_periodo='.$id_periodo.' AND id_prof='.$id.' group by id_asignatura'));
                //dd($docentes);
                    return View('docentes.show',compact('docentes','cuantos'));
                }
            
        }
        /*dd($docentes2);*/
        
    }
     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show2($id)
    {
        $docentes=Personal::find($id);
        $cursos=Cursos::lists('curso','id');
        //dd($docentes);
        return View('docentes.create',compact('docentes','cursos'));
        /*dd($docentes2);*/
    }

    public function show3($id)
    {
        $docentes=Personal::find($id);
        $cursos=Cursos::where('id','>','4')->lists('curso','id');
        //dd($docentes);
        return View('docentes.create2',compact('docentes','cursos'));
        /*dd($docentes2);*/
    }
    public function buscar($id)
    {
        return $seccion = Seccion::where('id_curso',$id)->get();  
    }

     public function buscar2($id)
    {
        return $asignatura = Asignaturas::where('id_curso',$id)->get();  
        
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
         dd($request->all());
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
        $docentes = Personal::find($request->id_prof);
        $id_periodo= Session::get('periodo');

        
        if($docentes->cargo->nombre=="DOCENTE DE PLANTA"){
            $result=DB::table('asignacion')->where('id_seccion',$request->id_seccion)->where('id_prof',$request->id_prof)->where('id_periodo',$id_periodo)->delete();
            Session::flash('message', 'DOCENTE DESINCORPORADO DE LA CARGA ACADÉMICA');
        }else{

            $result=DB::table('asignacion')->where('id_seccion',$request->id_seccion)->where('id_prof',$request->id_prof)->where('id_asignatura',$request->codigo)->where('id_periodo',$id_periodo)->delete();
            Session::flash('message', 'DOCENTE DESINCORPORADO DE LA CARGA ACADÉMICA');
        }

            $docentes=Personal::all();
        return View('docentes.index',compact('docentes'));

    }

    public function coordinacion($id){
    
        $id_periodo= Session::get('periodo');
        $docentes=Personal::find($id);
        //dd($docentes);
      

            $docentes=Personal::find($id);
            $sql='SELECT ac.id,secc.literal,cursos.curso FROM asignacion_coordinador ac INNER JOIN secciones secc ON ac.id_seccion = secc.id INNER JOIN cursos ON secc.id_curso=cursos.id WHERE ac.id_prof='.$id.' AND ac.id_periodo='.$id_periodo;
                //dd($sql);
            $docentes2 = DB::select(DB::raw($sql));
                $cuantos=count($docentes2);
                //dd($docentes->secciones_coordinacion);
                if($cuantos==0){                   
                    return View('docentes.show2',compact('cuantos','docentes'));
                }else{
                    return View('docentes.show2',compact('docentes','cuantos','docentes2'));
                }
            
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $delete=DB::table('asignacion_coordinador')->where('id',$id)->delete();
        if($delete){
             Session::flash('message', 'COORDINACIÓN ELIMINADA EXITOSAMENTE');
              $docentes=Personal::all();
        return View('docentes.index',compact('docentes'));
        }else{

            Session::flash('message-error', 'LA COORDINACIÓN NO HA SIDO ELIMINADA');
              $docentes=Personal::all();
        return View('docentes.index',compact('docentes'));;

        }
    }
}
