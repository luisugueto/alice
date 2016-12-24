<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Asignaturas;
use App\Categorias_parcial;
use App\Equivalencias;
use App\Comportamiento;
use Auth;
use App\Estudiantes;
use App\Personal;
use Session;
use App\Periodos;
use DB;
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
                    $sql="SELECT asignacion.*,cursos.*,secciones.*,datos_generales_estudiante.* FROM asignacion,datos_generales_personal,cursos,secciones,inscripciones,datos_generales_estudiante WHERE datos_generales_personal.id=asignacion.id_prof AND asignacion.id_prof=".$personal->id." AND cursos.id=secciones.id_curso AND (inscripciones.id_seccion=asignacion.id_seccion AND inscripciones.id_periodo=".$id_periodo." AND asignacion.id_periodo=".$id_periodo.") GROUP BY inscripciones.id_estudiante";
                   
                   $estudiantes=DB::select($sql);

                    $contador++;
                        //dd($docente->asignaturas);
                    return View('parciales.index',compact('docente','periodo','estudiantes'));
                
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
        $asignaturas=Asignaturas::where('id_curso',$id)->get();
        $categorias=Categorias_parcial::all();
        $equivalencias=Equivalencias::all();
        $comportamiento=Comportamiento::all();
        $promedio_comp=Comportamiento::lists('literal','id');
        return View('parciales.create',compact('asignaturas','categorias','equivalencias','comportamiento','promedio_comp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd($id);
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
