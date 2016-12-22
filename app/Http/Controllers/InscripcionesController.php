<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Estudiante;
use App\Quimestrales;
use App\Cursos;
use AppSeccion;
use Session;
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $buscar=Quimestrales::where('id_estudiante',$id)->first();
        $estudiantes=Estudiante::find($id);
        $encontrado=count($buscar);

            if ($encontrado==0) {
                # es nuevo
                $estado="Nuevo Ingreso";
                $cursos=Cursos::lists('curso','id');
            
                return View('inscripciones.create',compact('estudiantes','cursos','estado'));
            
            } else {
                # es regular
                # 
                $estado="Regular";
                    $id_periodo= Session::get('periodo');
                $buscar2=DB::select('SELECT * FROM inscripciones WHERE id='.$request->id_estudiante.' AND id_periodo='.$id_periodo.'');
            }

                


    }
    

    public function buscar($id)
    {
        return $seccion = Seccion::where('id_curso',$id)->get();  
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
