<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asignaturas;
use App\Http\Requests;
use App\Http\Requests\AsignaturasRequest;
use App\Cursos;
use Session;
use Auth;

class AsignaturasController extends Controller
{
    public function __construct(){
    /*    if(Auth::user()->roles_id == 5){
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
        $asignaturas = Asignaturas::all();

        return view('asignaturas.index', compact('asignaturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asignaturas = Asignaturas::all();
        $curso = Cursos::lists('curso', 'id');
        return view('asignaturas.create', compact('curso', 'asignaturas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AsignaturasRequest $request)
    {
        $nombre = strtoupper($request->asignatura);
        $optativo = $request->optativo;
        $id_curso = $request->id_curso;

        $ex = explode(" ", $nombre);
        $i = 0;
        $palabra = array();
        foreach ($ex as $key) {
            $palabra[] = $key;
        }
        $explode = array();
        $conca = '';
        foreach ($palabra as $key) {
            $explode = str_split($key);
            $conca .= $explode[0];
        }

        $conca .= '-'.$id_curso;
        $conca = ($optativo=='Y') ? $conca.='O': $conca;

        $asignatura = new Asignaturas();
        $asignatura->asignatura = $nombre;
        $asignatura->codigo = $conca;
        $asignatura->id_curso = $id_curso;
        $asignatura->save();

        Session::flash('message', 'ASIGNATURA CREADA CORRECTAMENTE');

        $asignaturas = Asignaturas::all();

        return view('asignaturas.index', compact('asignaturas'));

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
        $asignaturas = Asignaturas::find($id);
        $curso = Cursos::lists('curso', 'id');
        return view('asignaturas.edit', compact('asignaturas', 'curso'));
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
        $nombre = strtoupper($request->asignatura);
        $optativo = $request->optativo;
        $id_curso = $request->id_curso;

        $ex = explode(" ", $nombre);
        $i = 0;
        $palabra = array();
        foreach ($ex as $key) {
            $palabra[] = $key;
        }
        $explode = array();
        $conca = '';
        foreach ($palabra as $key) {
            $explode = str_split($key);
            $conca .= $explode[0];
        }

        $conca .= '-'.$id_curso;
        $conca = ($optativo=='Y') ? $conca.='O': $conca;


        $asignaturas = Asignaturas::find($id);
        $asignaturas->asignatura = $nombre;
        $asignaturas->codigo = $conca;
        $asignaturas->id_curso = $id_curso;
        $asignaturas->save();

        Session::flash('message', 'ASIGNATURA EDITADA CORRECTAMENTE');

        $asignaturas = Asignaturas::all();

        return view('asignaturas.index', compact('asignaturas'));
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
