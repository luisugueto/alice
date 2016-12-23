<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\RubrosRealizados;
use App\Estudiante;
use App\Rubros;
use App\Modalidad;
use App\FormasPago;


class FacturacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rubros = \DB::table('facturacion')->get();

        $i = 0;

        foreach ($rubros as $key => $rubro) 
        {
            $facturacion[$i] = $rubro->id;
            $estudiantes[$i] = Estudiante::find($rubro->id_estudiante);
            $representante[$i] = $estudiantes[$i]->representante;
            $rubros_e[$i] = Rubros::find($rubro->id_rubro);
            $i++; 
        }

        //dd($facturacion);
        return view('facturaciones.index', compact('facturacion', 'estudiantes', 'rubros_e', 'representante', 'rubros'));
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
        //
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

        $rubros = Rubros::find($id);
        $modalidad = Modalidad::lists('modalidad', 'id');
        $formas_pago = FormasPago::all();
  
        return view('facturaciones.edit', compact('rubros', 'modalidad', 'formas_pago'));
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
