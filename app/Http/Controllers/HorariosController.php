<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\HorarioRequest;
use App\Cursos;
use App\Seccion;
use App\Asignaturas;
use App\Aula;
use App\Personal;
use App\Periodos;
use Session;
use DB;
use Auth;



class HorariosController extends Controller
{
    public function __construct(){
       /* if(Auth::user()->roles_id == 5){
            $this->middleware('dace');
        }
        elseif(Auth::user()->roles_id == 2){
            $this->middleware('director');
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

        $horarios = \DB::table('asignacion_bloques')
                             ->join('secciones', 'asignacion_bloques.id_seccion', '=', 'secciones.id')
                             ->join('periodos', 'asignacion_bloques.id_periodo', '=', 'periodos.id')
                             ->join('cursos', 'secciones.id_curso', '=', 'cursos.id')
                             ->groupBy('id_seccion')
                             ->get();
        //dd($horarios);
        return view('horarios.index', compact('horarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(HorarioRequest $request)
    {
        //dd($request->all());

    /*  $bloques = DB::table('bloques')->get();
        $horas = DB::table('bloques')->where('id_dia', 1)->get();
        $dias = DB::table('dias')->get();
        */

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

        // BUSCANDO BLOQUES ASIGNADOS DE LA SECCIÓN
        $i= 0;
        $m= 0;

        $asignados = DB::table('asignacion_bloques')->where([['id_seccion', $request->id_seccion], ['id_periodo', Session::get('periodo')]])->get();

        if(!empty($asignados))
        {
            foreach ($asignados as $asignado) 
            {
                $bloques_asignados[$i] = $asignado->id_bloque;
                $asignaturas_asignadas[$i] = $asignado->id_asig;
                $i++;
            }

        }else{

            $bloques_asignados = array(); 
            $asignaturas_asignadas = array();
        }

        // BUSCANDO BLOQUES ASIGNADOS CON EL AULA

        foreach ($bloques as $bloque) 
        {
            $asignadas = DB::table('asignacion_bloques')->where([['id_bloque', $bloque->id], ['id_aula', $request->id_aula], ['id_periodo', Session::get('periodo')]])->first();

            if(!empty($asignadas))
            {
                $aulas_asignadas[$j] = $asignadas->id_bloque;
                $j++;
            }

        }

        //VERIFICO SI NO HAY NINGÚNA AULA ASIGNADA

        if(empty($aulas_asignadas))
        {
            $aulas_asignadas = array();
        }
        //dd($bloques);
        //dd($aulas_asignadas);
        //dd($asignaturas_asignadas);
 
        //dd($asignados);
        //dd($bloques_asignados);
        $curso = Cursos::find($request->id_curso);
        $seccion = Seccion::find($request->id_seccion);
        $asignaturas = Asignaturas::where('id_curso', $request->id_curso)->get();
        $asignatura = Asignaturas::find($request->id_asignatura);
        $aula = Aula::find($request->id_aula);
        
        return view('horarios.create', compact('bloques', 'bloques2', 'bloques_asignados', 'asignaturas_asignadas', 'aulas_asignadas', 'horas', 'dias', 'curso', 'seccion', 'asignatura', 'asignaturas', 'aula'));

        // dd($periodo);
        // return view('horarios.create', compact('bloques', 'bloques2', 'horas', 'dias', 'curso', 'seccion', 'asignatura', 'aula'));

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

                return redirect('horarios/buscar');
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
        $seccion = Seccion::find($id);
        $curso = $seccion->curso;
        $asignaturas = Asignaturas::where('id_curso', $curso->id)->get();
        $bloques = \DB::table('bloques')->get();
        $horas = \DB::table('bloques')->where('id_dia', 1)->get();
        $dias = \DB::table('dias')->get();
        $periodo = \DB::table('periodos')->where('id', Session::get('periodo'))->first();

        $horario = \DB::table('asignacion_bloques')->where([['id_seccion', $id], ['id_periodo', Session::get('periodo')]])->get();

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

        $asignados = DB::table('asignacion_bloques')->where([['id_seccion', $id], ['id_periodo', Session::get('periodo')]])->get();

        foreach ($asignados as $asignado) 
        {
            $bloques_asignados[$i] = $asignado->id_bloque;
            $asignaturas_asignadas[$i] = $asignado->id_asig;
            $aulas[$i] = $asignado->id_aula;
            $i++;    
        }

        foreach ($bloques as $bloque) 
        {
            foreach ($aulas as $aula)
            {
                $asignadas = DB::table('asignacion_bloques')->where([['id_aula', $aula], ['id_bloque', $bloque->id], ['id_periodo', Session::get('periodo')]])->first();

                if(!empty($asignadas))
                {
                    $aulas_asignadas[$j] = $asignadas->id_bloque;
                    $j++;
                }
            }

        }

        if(empty($aulas_asignadas))
        {
            $aulas_asignadas = array();
        }

        //dd($aulas);
        //dd($aulas_asignadas);

        return view('horarios.forms.show', compact('bloques', 'bloques2', 'bloques_asignados', 'asignaturas_asignadas', 'asignaturas', 'aulas_asignadas', 'horas', 'dias', 'curso', 'periodo', 'seccion', 'asignatura', 'aula', 'aulas'));
      //  return view('horarios.forms.show', compact('seccion', 'curso', 'bloques2', 'horas', 'dias', 'periodo')); 

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $seccion = Seccion::find($id);
        $curso = $seccion->curso;
        $bloques = \DB::table('bloques')->get();
        $horas = \DB::table('bloques')->where('id_dia', 1)->get();
        $dias = \DB::table('dias')->get();
        $periodo = \DB::table('periodos')->where('id', Session::get('periodo'))->first();
        $horario = \DB::table('asignacion_bloques')->where([['id_seccion', $id], ['id_periodo', Session::get('periodo')]])->get();

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

        $asignados = DB::table('asignacion_bloques')->where([['id_seccion', $id], ['id_periodo', Session::get('periodo')]])->get();

        foreach ($asignados as $asignado)
        {
            $bloques_asignados[$i] = $asignado->id_bloque;
            $asignaturas_asignadas[$i] = $asignado->id_asig;
            $aulas[$i] = $asignado->id_aula;
            $i++;
        }

        foreach ($bloques as $bloque)
        {
            if(!empty($aulas))
            {
                foreach ($aulas as $aula)
                {
                     $asignadas = DB::table('asignacion_bloques')->where([['id_aula', $aula], ['id_bloque', $bloque->id]])->first();
                }

                if(count($asignadas) > 0)
                {
                    $aulas_asignadas[$j] = $asignadas->id_bloque;
                    $j++;
                }

            }else{

                Session::flash('message-error', 'TODAS LAS ASIGNATURAS FUERON ELIMINADAS');

                return redirect('horarios');
            }
        }

        return view('horarios.edit', compact('bloques', 'bloques2', 'bloques_asignados', 'asignaturas_asignadas', 'aulas_asignadas', 'aulas', 'horas', 'dias', 'curso', 'periodo', 'seccion', 'asignatura', 'aula'));

    }

    public function pdf($seccion, $curso, $periodo)
    {
        $seccion = Seccion::find($seccion);
        $curso = $seccion->curso;
        $asignaturas = Asignaturas::where('id_curso', $curso->id)->get();
        $bloques = \DB::table('bloques')->get();
        $horas = \DB::table('bloques')->where('id_dia', 1)->get();
        $dias = \DB::table('dias')->get();
        $periodo = \DB::table('periodos')->where('id', $periodo)->first();

        $horario = \DB::table('asignacion_bloques')->where([['id_seccion', $seccion->id], ['id_periodo', $periodo->id]])->get();

        $k = 0;

        for ($i = 0; $i < 9; $i++) {

            for ($j = 0; $j < 5; $j++) {
                $bloques2[$i][$j] = $bloques[$k];
                $k++;
            }
        }

        //BUSCANDO BLOQUES ASIGNADOS
        $i = 0;
        $j = 0;

        $asignados = DB::table('asignacion_bloques')->where([['id_seccion', $seccion->id], ['id_periodo', $periodo->id]])->get();

        foreach ($asignados as $asignado) {
            $bloques_asignados[$i] = $asignado->id_bloque;
            $asignaturas_asignadas[$i] = $asignado->id_asig;
            $aulas[$i] = $asignado->id_aula;
            $i++;
        }

        foreach ($bloques as $bloque)
        {
            foreach ($aulas as $aula)
            {
                $asignadas = DB::table('asignacion_bloques')->where([['id_aula', $aula], ['id_bloque', $bloque->id], ['id_periodo', $periodo->id]])->first();

                if (!empty($asignadas))
                {
                    $aulas_asignadas[$j] = $asignadas->id_bloque;
                    $j++;
                }
            }

        }

        $pdf =  \PDF::loadView('pdf.horario.index', ['bloques' => $bloques, 'bloques2' => $bloques2, 'bloques_asignados' => $bloques_asignados, 'asignaturas_asignadas' => $asignaturas_asignadas, 'asignaturas' => $asignaturas, 'aulas_asignadas' => $aulas_asignadas, 'horas' => $horas, 'dias' => $dias, 'curso' => $curso, 'periodo' => $periodo, 'seccion' => $seccion, 'aulas' => $aulas]);
        return $pdf->stream();

        //return view('pdf.horario.index', compact('bloques', 'bloques2', 'bloques_asignados', 'asignaturas_asignadas', 'asignaturas', 'aulas_asignadas', 'horas', 'dias', 'curso', 'periodo', 'seccion', 'asignatura', 'aula', 'aulas'));

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
    public function destroy(Request $request)
    {   
        $bloque = \DB::table('asignacion_bloques')->where([['id_bloque', $request->id_bloque], ['id_aula', $request->id_aula], ['id_asig', $request->id_asig], ['id_seccion', $request->id_seccion], ['id_periodo', Session::get('periodo')]])->delete();

        Session::flash('message-error', 'ASIGNATURA ELIMINADA');

        return redirect()->back();
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
