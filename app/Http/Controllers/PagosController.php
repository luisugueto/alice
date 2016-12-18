<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Personal;
use App\FormaPagosRealizados;
use App\FormasPago;
use App\Modalidad;
use App\Prestamo;
use App\Pagos;
use App\User;
use App\PagosRealizados;
use Redirect;
use Session;
use DB;

class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        $prestamos = Prestamo::where('id', $request['id'])->get();

        foreach ($prestamos as $key) {
            $id_personal = $key->id_personal;
            $monto = $key->monto;
        }
        
        $FormasPago = new FormasPago();
        if($request['efectivo']=='on')
            $FormasPago->forma = 'efectivo';
        if($request['cheque']=='on')
            $FormasPago->forma = 'cheque';
        if($request['transferencia']=='on')
        $FormasPago->forma = 'transferencia';
        $FormasPago->save();

        $formapago = FormasPago::all()->last();

        $pagos = new Pagos();
        $pagos->id_personal = $id_personal;
        $pagos->id_prestamo = $request['id'];
        $pagos->save();

        $pago = Pagos::all()->last();

        $FormaPagosRealizados = new FormaPagosRealizados();
        $FormaPagosRealizados->id_pagos = $pago->id;
        $FormaPagosRealizados->id_forma = $formapago->id;
        $FormaPagosRealizados->save();

        $modalidad = new Modalidad();
        if($request['modalidad'] == 'C')
            $modalidad->modalidad = 'exacto';
        if($request['modalidad'] == 'A')
            $modalidad->modalidad = 'exacto';
        $modalidad->save();

        $ultimaModalidad = Modalidad::all()->last();
        $PagosRealizados = new PagosRealizados();
        if($request['modalidad'] == 'C'){
            $PagosRealizados->monto_pagado = $monto;
            $PagosRealizados->monto_adeudado = '0';
        }
        else {
            $PagosRealizados->monto_adeudado += $request['monto'];
            $PagosRealizados->monto_pagado += (isset($request['monto'])) ? $request['monto'] : '';
        }
        $PagosRealizados->fecha = new \DateTime();
        $PagosRealizados->id_prestamo = $request['id'];
        $PagosRealizados->id_modalidad = $ultimaModalidad->id;
        $PagosRealizados->id_personal = $id_personal;
        if($request['transferencia']=='on')
            $PagosRealizados->no_transferencia = $request['no_transferencia'];
        else $PagosRealizados->no_transferencia = '0';
        if($request['cheque']=='on')
            $PagosRealizados->no_cheque = $request['no_cheque'];
        else $PagosRealizados->no_cheque = '0';
        $PagosRealizados->save();

        Session::flash('message', 'Pago Realizado Correctamente.');
        $prestamos = Prestamo::all();
        return view('prestamos.index', ['prestamo'=>$prestamos]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prestamos = Prestamo::find($id);
        return view('prestamos.registrar', ['prestamos'=>$prestamos]);
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
