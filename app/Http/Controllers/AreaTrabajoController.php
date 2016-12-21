<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AreaTrabajo;
use App\Http\Requests;
use App\Http\Requests\AreaTrabajoRequest;
use Session;

class AreaTrabajoController extends Controller
{
    public function __construct(){
        if(Auth::user()->roles_id == 4){
            $this->middleware('recursohumano');
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
        $area = AreaTrabajo::all();
        return view('areas.index', compact('area'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('areas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaTrabajoRequest $request)
    {
        $area = new AreaTrabajo();
        $area->nombre = strtoupper($request->nombre);
        $area->save();
        Session::flash('message', 'AREA DE TRABAJO REGISTRADA CORRECTAMENTE');
        $area = AreaTrabajo::all();
        return view('areas.index', compact('area'));
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
        $area = AreaTrabajo::find($id);

        return view('areas.edit', compact('area'));
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
        $area = AreaTrabajo::find($id);
        $area->nombre = $request->nombre;
        $area->save();

        Session::flash('message', 'AREA DE TRABAJO EDITADA CORRECTAMENTE');

        $area = AreaTrabajo::all();
        return view('areas.index', compact('area'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AreaTrabajo::destroy($id);

        $area = AreaTrabajo::all();
        return view('areas.index', compact('area'));
    }
}
