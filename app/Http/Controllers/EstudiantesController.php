<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Estudiante;
use App\Representante;
use App\Facturacion;
use App\Documentacion;
use App\DatosMedico;
use App\Padres;
use App\Http\Requests\EstudianteRequest;
use App\Http\Requests\CedulaEstudianteRequest;

class EstudiantesController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$estudiantes = Estudiante::all();

        return view('estudiantes.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    	$representante = Representante::where('id', $request->representante)->first();

    	if(!empty($representante)) 
    	{

    		return view('estudiantes.create', compact('representante'));

    	}else{

        	return view('estudiantes.create');

    	}
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstudianteRequest $request)
    {
        dd($request->all());
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

    public function search(CedulaEstudianteRequest $request)
    {

        $estudiante = Estudiante::where('cedula', $request->cedula)->first();

        if(!empty($estudiante)) 
        {

            return redirect()->back();

        }else{

            $cedula = $request->cedula;

            return view('estudiantes.create', compact('cedula'));
        }
    }
}
