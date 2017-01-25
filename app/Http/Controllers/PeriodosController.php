<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Periodos;
use Redirect;
use Session;

class PeriodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_periodo=Session::get('periodo');
        $periodo=Periodos::find($id_periodo);
        return view('periodos.index',compact('periodo'));
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
        $periodo = Periodos::where('status', 'activo')->first();
        $periodoActivar = $periodo->id + 1;

        $año = date('Y');
        if($año == $periodo->nombre+1){
            $desactivar = Periodos::find($periodo->id);
            $desactivar->status = 'inactivo';
            $desactivar->save();
            $nombre = Periodos::where('nombre', $año)->first();
            $activar = Periodos::find($nombre->id);
            $activar->status = 'activo';
            $activar->save();
            Session::flash('message', 'NUEVO PERIODO '.$año.' ACTIVADO');
            return redirect()->action('PeriodosController@index');
        }
        else{
            Session::flash('message-error', 'NO SE PUDO ACTIVAR EL NUEVO PERIODO');
            return redirect()->action('PeriodosController@index');   
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
