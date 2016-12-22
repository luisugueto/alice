<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PagosPrestamoRequest;
use App\Personal;
use App\FormaPagosRealizados;
use App\FormasPago;
use App\Modalidad;
use App\Prestamo;
use App\Remuneracion;
use App\Pagos;
use App\User;
use App\PagosRealizados;
use Redirect;
use Session;
use DB;
use Excel;
use PDF;
use PHPExcel_Worksheet_Drawing;
use Auth;

class PagosController extends Controller
{
    public function __construct(){
       /* if(Auth::user()->roles_id == 4){
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
        
    }

    public function descargar(){
        $prestamo = Prestamo::all();
        $suma = 0;
        foreach($prestamo as $per){
            $i = 0; $monto = 0;
            foreach ($per->pagosrealizados as $key) {
                $i += $key->monto_pagado;
                $monto = $key->monto_adeudado;
            }                    
            $per->fecha;
            $per->personal->nombres;                
            $per->tipo;
            $per->monto;
            $per->monto-$i;
            if($per->tipo == 'Prestamo')
            {
                if(($per->monto-$i)==0 || ($per->monto-$i)<=0)
                {

                }
                else $suma++;
                }                
            }

            Excel::create("Listado Total de Prestamos y Anticipos", function ($excel) use ($prestamo) {
               
                $excel->setTitle("Listado Total de Prestamos y Anticipos");
                $excel->sheet("Pestaña 1", function ($sheet) use ($prestamo) {
                    $sheet->loadView('prestamos.excel.descargartotal')->with('prestamo', $prestamo);
                });
            })->download('xls');
        // $pdf = PDF::loadView('prestamos.excel.descargartotal', compact('prestamo'));
        // return $pdf->download('invoice.pdf');
    }

    public function descargarPagosMensual(Request $request){
         $per = Remuneracion::where('id_personal', $request['persona'])
               ->orderBy('id', 'desc')
               ->first();
        $pagosrealizados = DB::select('SELECT *, sum(monto_pagado) as monto FROM pagos_realizados WHERE id_personal = '.$request['persona'].'');

        foreach ($pagosrealizados as $key) {
            $monto_pagos = $key->monto;
        }

        $prestamos = DB::select('SELECT *, sum(monto) as monto FROM prestamos WHERE id_personal = '.$request['persona'].'');

        foreach ($prestamos as $key) {
            $monto_prestamos = $key->monto;
        }

        $pagadoTotal = $monto_prestamos-$monto_pagos;
    
        $suma = $per->sueldo_mens + $per->bono_responsabilidad;

        #$capital = $suma-$pagadoTotal;


        $prestamos = DB::select('SELECT *,SUM(monto) as monto FROM prestamos WHERE id_personal = '.$request['persona'].' GROUP BY id_personal');

        foreach ($prestamos as $value) {
            $total = $value->monto;
        }
    
        $prestamo = Prestamo::where('id_personal', $request['persona'])->get();

        Excel::create("Listado de Pagos Mensual", function ($excel) use ($prestamo, $total) {
                $excel->setTitle("Listado de Pagos Mensual");
                $excel->sheet("Pestaña 1", function ($sheet) use ($prestamo, $total) {
                    $sheet->loadView('prestamos.excel.descargarPagosMensual', array('prestamo'=>$prestamo, 'total'=>$total));
                });
            })->download('xls');

    }

    public function descargarListado(){
        define('mesActual', date('m'));
        $prestamo = Prestamo::whereMonth('fecha', '=', mesActual)->get();
        Excel::create("Listado Total de Prestamos y Anticipos", function ($excel) use ($prestamo) {
                $excel->setTitle("Listado Total de Prestamos y Anticipos");
                $excel->sheet("Pestaña 1", function ($sheet) use ($prestamo) {
                    $sheet->loadView('prestamos.excel.descargarListado')->with('prestamo', $prestamo);
                });
            })->download('xls');

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
    public function store(PagosPrestamoRequest $request)
    {      
        $prestamos = Prestamo::where('id', $request['id'])->get();

        foreach ($prestamos as $key) {
            $id_personal = $key->id_personal;
            $id_prestamo = $key->id;
            $monto = $key->monto;
        } 
     
        $prestamo = PagosRealizados::where('id_prestamo', $id_prestamo)->count();
        $pr = PagosRealizados::where('id_prestamo', $id_prestamo)->orderBy('id', 'desc')->take(1)->get();

        foreach ($pr as $key) {
            $montoo = $key->monto_adeudado;
        }      

        $prestamos = Prestamo::where('id', $request['id'])->get();

        foreach ($prestamos as $key) {
            $id_personal = $key->id_personal;
            $monto = $key->monto;
        }

        $pagos = new Pagos();
        $pagos->id_personal = $id_personal;
        $pagos->id_prestamo = $request['id'];
        $pagos->save();

        $pago = Pagos::all()->last();

        $FormaPagosRealizados = new FormaPagosRealizados();
        $FormaPagosRealizados->id_pagos = $pago->id;
        if($request['Efectivo']=='on')
            $FormaPagosRealizados->id_forma = 1;
        elseif($request['Cheque']=='on')
            $FormaPagosRealizados->id_forma = 2;
        elseif($request['Transferencia']=='on')
            $FormaPagosRealizados->id_forma = 3;;
        $FormaPagosRealizados->save();

        if($prestamo==0)
        {
            $PagosRealizados = new PagosRealizados();
            if($request['modalidad'] == 1){
                $PagosRealizados->monto_pagado = $monto;
                $PagosRealizados->monto_adeudado = '0';
            }
            else {
                $PagosRealizados->monto_adeudado = $monto-$request['monto'];
                $PagosRealizados->monto_pagado = (isset($request['monto'])) ? $request['monto'] : '';
            }
            $PagosRealizados->fecha = new \DateTime();
            $PagosRealizados->id_prestamo = $request['id'];
            $PagosRealizados->id_modalidad = $request['modalidad'];
            $PagosRealizados->id_personal = $id_personal;
            if($request['Transferencia']=='on')
                $PagosRealizados->no_transferencia = $request['no_transferencia'];
            else $PagosRealizados->no_transferencia = '0';
            if($request['Cheque']=='on')
                $PagosRealizados->no_cheque = $request['no_cheque'];
            else $PagosRealizados->no_cheque = '0';
            $PagosRealizados->save();
        }else{
            $PagosRealizados = new PagosRealizados();
            if($request['modalidad'] == 1){
                $PagosRealizados->monto_pagado = $montoo;
                $PagosRealizados->monto_adeudado = '0';
            }
            else {
                $PagosRealizados->monto_adeudado = $montoo-$request['monto'];
                $PagosRealizados->monto_pagado = (isset($request['monto'])) ? $request['monto'] : '';
            }
            $PagosRealizados->fecha = new \DateTime();
            $PagosRealizados->id_prestamo = $request['id'];
            $PagosRealizados->id_modalidad = $request['modalidad'];
            $PagosRealizados->id_personal = $id_personal;
            if($request['transferencia']=='on')
                $PagosRealizados->no_transferencia = $request['no_transferencia'];
            else $PagosRealizados->no_transferencia = '0';
            if($request['cheque']=='on')
                $PagosRealizados->no_cheque = $request['no_cheque'];
            else $PagosRealizados->no_cheque = '0';
            $PagosRealizados->save();
        }

        Session::flash('message', 'PAGO REALIZADO CORRECTAMENTE');
        
        return redirect('prestamos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $forma = FormasPago::all();
        $modalidad = Modalidad::lists('modalidad', 'id');
 
        $prestamos = Prestamo::find($id);
        return view('prestamos.registrar', ['prestamos'=>$prestamos, 'forma'=>$forma, 'modalidad'=>$modalidad]);
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
