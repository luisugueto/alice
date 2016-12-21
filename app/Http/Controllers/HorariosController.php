<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cursos;
use App\Seccion;
use App\Asignaturas;
use App\Aula;
use App\Personal;
use Session;
use DB;
use Auth;



class HorariosController extends Controller
{
    public function __construct(){
        if(Auth::user()->roles_id == 5){
            $this->middleware('dace');
        }
        elseif(Auth::user()->roles_id == 2){
            $this->middleware('director');
        }
        else{
            $this->middleware('administrador');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('horarios.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //dd($request->all());

        $bloques = DB::table('bloques')->get();
        $horas = DB::table('bloques')->where('id_dia', 1)->get();
        $dias = DB::table('dias')->get();
        

        $bloques = \DB::table('bloques')->get();
        $horas = \DB::table('bloques')->where('id_dia', 1)->get();
        $dias = \DB::table('dias')->get();
        $periodo = Session::get('periodos');

        $k=0;
        
        for ($i=0; $i < 9 ; $i++) { 
    
            for ($j=0; $j < 5 ; $j++) 
            { 
                $bloques2[$i][$j] = $bloques[$k];
                $k++;
            }
        }

        //BUSCANDO BLOQUES ASIGNADOS
        $i= 0;
        $j= 0;

        $asignados = DB::table('asignacion_bloques')->where([['id_seccion', $request->id_seccion], ['id_periodo', Session::get('periodo')]])->get();

        if(count($asignados) > 0)
        {
            foreach ($asignados as $asignado) 
            {
                $bloques_asignados[$i] = $asignado->id_bloque;
                $asignaturas_asignadas[$i] = $asignado->id_asig;

                $i++;
                
            }

        }else{

            $aulas_asignadas = array();
            $bloques_asignados = array(); 
            $asignaturas_asignadas = array();
        }

        foreach ($bloques as $bloque) 
        {
            $asignadas = DB::table('asignacion_bloques')->where([['id_aula', $request->id_aula], ['id_bloque', $bloque->id]])->get();

            if(count($asignadas) > 0)
            {
                foreach ($asignadas as $asignadas) 
                {
                    $aulas_asignadas[$j] = $asignadas->id_bloque;
                    $j++;
                }
            }
        }


        //dd($asignaturas_asignadas);
 
        //dd($asignados);
        //dd($bloques_asignados);
        $curso = Cursos::find($request->id_curso);
        $seccion = Seccion::find($request->id_seccion);
        $asignatura = Asignaturas::find($request->id_asignatura);
        $aula = Aula::find($request->id_aula);
        
        return view('horarios.create', compact('bloques', 'bloques2', 'bloques_asignados', 'asignaturas_asignadas', 'aulas_asignadas', 'horas', 'dias', 'curso', 'seccion', 'asignatura', 'aula'));

        dd($periodo);
        return view('horarios.create', compact('bloques', 'bloques2', 'horas', 'dias', 'curso', 'seccion', 'asignatura', 'aula'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(!isset($request->id_bloque))
        {
            Session::flash('message-error', 'DEBE SELECCIONAR ALMENOS UNA OPCIÓN');

            return redirect()->back();

        }else{

            foreach ($request->id_bloque as $key => $bloque) 
            {
                $choca = \DB::table('asignacion_bloques')->where([['id_aula', $request->id_aula], ['id_bloque', $bloque]])->exists();
                //dd($choca);
            }

            if($choca)
            {

                Session::flash('message-error', 'ESTE BLOQUE YA ESTA ASIGNADO');

                return redirect()->back();

            }else{

                $seccion = Seccion::find($request->id_seccion);

                foreach ($request->id_bloque as $key => $bloque) 
                {
                    $seccion->asignacion_b()->attach($bloque, ['id_aula' => $request->id_aula, 'id_asig' => $request->id_asig, 'id_periodo' => Session::get('periodo')]);    
                }
                
                Session::flash('message', 'SE HAN CREADO NUEVOS REGISTROS');

                return redirect()->back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $id)
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

    public function search()
    {

        $cursos = Cursos::lists('curso', 'id');
        $aulas = Aula::lists('nombre', 'id');

        return view('horarios.forms.fields-search', compact('cursos', 'aulas'));
    }
    
    public function getSecciones(Request $request, $id)
    {
        if ($request->ajax()) {
           return $secciones = Seccion::where('id_curso', $id)->get();
           
        }
    }

    public function getAsignaturas(Request $request, $id)
    {
        if ($request->ajax()) {

           return $asignaturas = Asignaturas::where('id_curso', $id)->get();

        }
    }

    public function getAsignados($bloque, $aula)
    {
        if ($request->ajax()) {

            return Response::json('hola');
        }
    }

}
