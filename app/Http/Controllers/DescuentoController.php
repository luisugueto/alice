<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\CantidadDescuento;
use App\Tipo;
use DB;
class DescuentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $descuentos=CantidadDescuento::all();

        $cantidad=count($descuentos);

        return View('descuentos.index',compact('descuentos','cantidad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_empleado=Tipo::all();

        return View('descuentos.create',compact('tipo_empleado'));
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
        $cuantos=count($id_tipoempleado);
        //dd($cuantos);

        for ($i=0; $i < $cuantos ; $i++) { 

            
            $descuentos=DB::insert("INSERT INTO cantidad_descuento(id_tipoempleado,cantidad) VALUES(".$id_tipoempleado[$i].",".$cantidad[$i].")");

        }

        return redirect('descuentos.index');
        
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
        $descuentos=CantidadDescuento::find($id);

        $tipo_empleado=Tipo::find($descuentos->id_tipoempleado);

        return View('descuentos.edit',compact('descuentos','tipo_empleado'));
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
        $descuentos=CantidadDescuento::find($id);

        $descuentos->cantidad=$request->cantidad;
        $descuentos->save();

        return redirect('descuentos.index');
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
