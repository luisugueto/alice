<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Estudiante;
use App\Profesor;
use App\Facturacion;
use App\Modalidad;
use App\FormasPago;
use App\RubrosRealizados;
use Session;

class RubrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rubros = Facturacion::all();

        return view('rubros.index', compact('rubros'));
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
        $estudiante = Estudiante::find($id);
        $rubros = $estudiante->facturaciones;
        $representante = $estudiante->representante;
        
        return view('rubros.show', compact('estudiante', 'rubros', 'representante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rubros = Facturacion::find($id);
        $modalidad = Modalidad::lists('modalidad', 'id');
        $formas_pago = FormasPago::get();

        return view('rubros.edit', compact('rubros', 'modalidad', 'formas_pago'));
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

     	$rubros = Facturacion::find($id);
        $existe = $rubros->rubros_realizados()->exists();

        if($request->nro_transferencia == "")
        {

            $nro_transferencia="0";

        }else{

            $nro_transferencia = $request->nro_transferencia;
        }

        if($request->nro_cheque=="")
        {

            $nro_cheque="0";

        }else{

            $nro_cheque = $request->nro_cheque;
        }


        if($existe)
        {
            $rubros_realizados = $rubros->rubros_realizados->last();
            
            if($request->monto_pagar > $rubros_realizados->monto_adeudado)
            {
                Session::flash('message-error', 'EL MONTO A PAGAR NO PUEDE SER MAYOR QUE EL DE LA DEUDA');

                return redirect()->back();

            }else{

                $monto_deuda = $rubros_realizados->monto_adeudado-$request->monto_pagar;

                $rubros_realizado = new RubrosRealizados;
                $rubros_realizado->monto_pagado = $request->monto_pagar;
                $rubros_realizado->monto_adeudado = $monto_deuda;
                $rubros_realizado->fecha = new \DateTime();
                $rubros_realizado->id_factura = $rubros->id;
                $rubros_realizado->id_modalidad = $request->id_modalidad;
                $rubros_realizado->id_estudiante = $rubros->estudiante->id;
                $rubros_realizado->no_transferencia = $nro_transferencia;
                $rubros_realizado->no_cheque = $nro_cheque;
                $rubros_realizado->save();

                for($i=0; $i < count($request->id_forma); $i++)
                {
                    $rubros_realizado->formas()->attach($request->id_forma[$i]);
                }

            }

        }else{

            if($request->monto_pagar > $rubros->monto)
            {
                Session::flash('message-error', 'EL MONTO A PAGAR NO PUEDE SER MAYOR QUE EL DE LA DEUDA');

                return redirect()->back();

            }else{

                $monto_deuda = $rubros->monto-$request->monto_pagar;

                $rubros_realizados = new RubrosRealizados;
                $rubros_realizados->monto_pagado = $request->monto_pagar;
                $rubros_realizados->monto_adeudado = $monto_deuda;
                $rubros_realizados->fecha = new \DateTime();
                $rubros_realizados->id_factura = $rubros->id;
                $rubros_realizados->id_modalidad = $request->id_modalidad;
                $rubros_realizados->id_estudiante = $rubros->estudiante->id;
                $rubros_realizados->no_transferencia = $nro_transferencia;
                $rubros_realizados->no_cheque = $nro_cheque;
                $rubros_realizados->save();

                for($i=0; $i < count($request->id_forma); $i++)
                {
                    $rubros_realizados->formas()->attach($request->id_forma[$i]);
                }

                return redirect('rubros');
            }
        }        
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

    public function search()
    {
        //
    }
}
