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
        $id_periodo= Session::get('periodo');
        if($request->cargo=="DOCENTE DE PLANTA"){

                $buscar=Asignaturas::where('id_curso',$request->id_curso)->first();
                //dd($buscar->id);
                
                $buscar2=DB::select('SELECT * FROM asignacion WHERE id_seccion='.$request->id_seccion.' AND id_asignatura='.$buscar->id.' AND id_periodo='.$id_periodo.'');
                $cuantos=count($buscar2);
            if ($cuantos>0) {
                    Session::flash('message-error', 'DISCULPE, ESTA SECCIÓN DE ESTE CURSO YA SE ENCUENTRA ASIGNADA A UN DOCENTE');
            } else { 

                    $asignaturas=Asignaturas::where('id_curso',$request->id_curso)->get();
                    foreach ($asignaturas as $asignaturas) {
                        $asignacion=DB::insert('INSERT INTO asignacion(id_prof,id_asignatura,id_seccion,id_periodo) VALUES('.$request->id_prof.','.$asignaturas->id.','.$request->id_seccion.','.$id_periodo.')');

                    }
                    Session::flash('message', 'CURSO Y SECCIÓN ASIGNADA EXITOSAMENTE');
            }

        }else{
                //dd($request->all());   
                $buscar2=DB::select('SELECT * FROM asignacion WHERE id_seccion='.$request->id_seccion2.' AND id_asignatura='.$request->id_asignatura.' AND id_periodo='.$id_periodo.'');

                $cuantos=count($buscar2);
            if ($cuantos>0) {
                    Session::flash('message-error', 'DISCULPE, ESTA ESTA ASIGNATURA Y SECCIÓN DE ESTE CURSO YA SE ENCUENTRA ASIGNADA A UN DOCENTE');
            } else { 

                    
                        $asignacion=DB::insert('INSERT INTO asignacion(id_prof,id_asignatura,id_seccion) VALUES('.$request->id_prof.','.$request->id_asignatura.','.$request->id_seccion2.')');

                    
                    Session::flash('message', 'CURSO, SECCIÓN Y ASIGNATURA ASIGNADA EXITOSAMENTE');
            }

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
        
        return View('docentes.show',compact('docentes'));
            
        } else {

            $docentes=Personal::find($id);
            $docentes2 = DB::select(DB::raw('select * from asignacion where id_periodo='.$id_periodo.' AND id_prof='.$id.' group by id_asignatura'));
                $cuantos=count($docentes2);

                if($cuantos==0){                   
                    return View('docentes.show',compact('cuantos','docentes'));
                }else{
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
        $docentes = Personal::find($id);
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
