<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cargo;
use App\AreaTrabajo;
use App\Tipo;
use App\Http\Requests;
use Session;
use Auth;

class CargosController extends Controller
{
    public function __construct(){
        /*if(Auth::user()->roles_id == 4){
            $this->middleware('recursohumano');
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
        $cargo = Cargo::all();
        
        return view('cargos.index', compact('cargo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $area = AreaTrabajo::lists('nombre', 'id');
        $tipo = Tipo::lists('tipo_empleado', 'id');
        return view('cargos.create', compact('area', 'tipo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cargo = new Cargo();
        $cargo->nombre = strtoupper($request->nombre);
        $cargo->id_area = $request->id_area;
        $cargo->id_tipo_empleado = $request->id_tipo_empleado;

        $cargo->save();

        Session::flash('message', 'CARGO REGISTRADO CORRECTAMENTE');

        $cargo = Cargo::all();
        return view('cargos.index', compact('cargo'));
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
        $cargo = Cargo::find($id);
        $area = AreaTrabajo::lists('nombre', 'id');
        $tipo = Tipo::lists('tipo_empleado', 'id');
        return view('cargos.edit', compact('cargo', 'area', 'tipo'));
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
        $cargo = Cargo::find($id);
        $cargo->nombre = strtoupper($request->nombre);
        $cargo->id_area = $request->id_area;
        $cargo->save();

        Session::flash('message', 'CARGO EDITADO CORRECTAMENTE');

        $cargo = Cargo::all();
        return view('cargos.index', compact('cargo'));
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
