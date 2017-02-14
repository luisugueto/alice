<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\DescontarMensualidad;
use DB;
use Redirect;
use Session;

class DescontarMensualidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $descuentos=DescontarMensualidad::all();

        return View('descontar_mensualidad.index',compact('descuentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('descontar_mensualidad.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        extract($request->all());
     

        return redirect('descontar_mensualidad.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $descuentos=DescontarMensualidad::find($id);


        return View('descontar_mensualidad.edit',compact('descuentos'));
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
        $descuentos=DescontarMensualidad::find($id);

        $descuentos->cantidad=$request->cantidad;
        $descuentos->save();
        Session::flash('message', 'DESCUENTO DE MENSUALIDAD MODIFICADO CORRECTAMENTE');
        return redirect()->route('descontar_mensualidad.index');
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
