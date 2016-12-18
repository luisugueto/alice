<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seccion;
use App\Http\Requests;
use Session;

class SeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seccion = Seccion::all();
        return view('secciones.index', ['seccion'=>$seccion]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('secciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $seccion = new Seccion();
        $seccion->literal = strtoupper($request['literal']);
        $seccion->capacidad = $request['capacidad'];
        $seccion->save();
        
        Session::flash('message', 'Seccion Creada Correctamente.');
        $seccion = Seccion::all();
        return view("secciones.index", ['seccion'=>$seccion]);
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
        $seccion = Seccion::find($id);
        return view('secciones.edit', ['seccion'=>$seccion]);
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
        $seccion = Seccion::find($id);
        $seccion->literal = strtoupper($request['literal']);
        $seccion->capacidad = $request['capacidad'];
        $seccion->save();

        Session::flash('message', 'Seccion Editada Correctamente.');
        $seccion = Seccion::all();
        return view("secciones.index", ['seccion'=>$seccion]);
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
