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


class HorariosController extends Controller
{
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
        $bloques = \DB::table('bloques')->get();
        $horas = \DB::table('bloques')->where('id_dia', 1)->get();
        $dias = \DB::table('dias')->get();
        
        $k=0;
        
        for ($i=0; $i < 7 ; $i++) { 
    
            for ($j=0; $j < 5 ; $j++) { 
                $bloques2[$i][$j] = $bloques[$k];
                $k++;
            }
        }

        $curso = Cursos::find($request->id_curso);
        $seccion = Seccion::find($request->id_seccion);
        $asignatura = Asignaturas::find($request->id_asignatura);
        $aula = Aula::find($request->id_aula);


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
            //dd(Session::all());
            $seccion = Seccion::find($request->id_seccion);

            foreach ($request->id_bloque as $key => $bloque) 
            {
                $seccion->asignacion_b()->attach($bloque, ['id_aula' => $request->id_aula, 'id_asig' => $request->id_asig, 'id_periodo' => '3']);    
            }
            
            Session::flash('message', 'SE HAN CREADO NUEVOS REGISTROS');

            return redirect('horarios');
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

    static function magic()
    {
        return "HOLA :D";
    }
}
