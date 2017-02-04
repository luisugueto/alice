<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AreaTrabajo;
use App\Http\Requests;
use App\Http\Requests\AreaTrabajoRequest;
use Session;
use Auth;

class AreaTrabajoController extends Controller
{
    public function __construct(){
       /* if(Auth::user()->roles_id == 4){
            $this->middleware('recursohumano');
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
        $area = AreaTrabajo::create($request->all())->save();

        Session::flash('message', 'ÁREA DE TRABAJO REGISTRADA CORRECTAMENTE');
        
        return redirect('areas');
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
    public function destroy(Request $request)
    {
        $area = AreaTrabajo::find($request->id);

        if($area->cargos()->exists()){

            Session::flash('message-error', 'AREA DE TRABAJO NO SE PUEDE ELIMINAR');

            return redirect()->back();

        } else {

            $area->delete();

            Session::flash('message', 'AREA DE TRABAJO '.$area->nomrbe.' ELIMINADA CORRECTAMENTE.');

            return redirect()->back();
        }
    }
}
