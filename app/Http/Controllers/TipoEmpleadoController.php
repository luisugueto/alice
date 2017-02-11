<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Tipo;
use Session;
class TipoEmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_empleado=Tipo::all();

        return View('tipo_empleado.index',compact('tipo_empleado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('tipo_empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $buscar=Tipo::where('tipo_empleado',$request->tipo_empleado)->first();
        
        $n=count($buscar);

        if ($n>0) {

            Session::flash('message-error', 'DISCULPE ESTE TIPO DE EMPLEADO YA HA SIDO REGISTRADO');

        } else {

            $tipo_empleado=Tipo::create($request->all());

            Session::flash('message', 'TIPO DE EMPLEADO REGISTRADO EXITOSAMENTE'); 
        }

        return redirect()->back();
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
        $tipo_empleado=Tipo::find($id);

        return View('tipo_empleado.edit',compact('tipo_empleado'));
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
         $buscar=Tipo::where('tipo_empleado',$request->tipo_empleado)->where('id','<>',$id)->first();
         $n=count($buscar);
        if ($n>0) {   Session::flash('message-error', 'DISCULPE ESTE TIPO DE EMPLEADO YA HA SIDO REGISTRADO');
           
        } else {
            $tipo_empleado=Tipo::find($id)->update($request->all());
           Session::flash('message', 'TIPO DE EMPLEADO ACTUALIZADO EXITOSAMENTE'); 
        }
        $tipo_empleado=Tipo::all();
        return redirect(route('tipo_empleado.index',compact('tipo_empleado')));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $tipo = Tipo::find($request->id);

        if($tipo->cargo()->exists()){

            Session::flash('message-error', 'DISCULPE NO SE PUEDE ELIMINAR ESTE TIPO DE EMPLEADO DEBIDO A QUE YA HA SIDO REGISTRADO EN UN CARGO.');

            return redirect()->back();

        } else {

            $tipo->delete();

            Session::flash('message', 'SE HA ELIMINADO EL TIPO DE EMPLEADO '.$tipo->tipo_empleado.' CORRECTAMENTE.');

            return redirect()->back();
        }
    }
}
