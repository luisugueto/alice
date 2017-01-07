<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\Prestamo;
use App\Remuneracion;
use App\Http\Requests;
use App\Http\Requests\PrestamoRequest;
use Session;
use DB;
use Excel;
use Auth;

class PrestamosAnticiposController extends Controller
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
        define('mesActual', date('m'));
        $prestamo = Prestamo::whereMonth('fecha', '=', mesActual)->get();
        #$prestamo = Prestamo::all();

        return view('prestamos.index', compact('prestamo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personal = Personal::all();
        return view('prestamos.create', compact('personal'));
    }

    public function ver()
    {
        $personal = Personal::all();
        return view('prestamos.ver', compact('personal'));
    }

    public function total(){

        #$prestamo = Prestamo::select(DB::raw('sum(monto) as monto, id_personal, tipo, fecha'))->groupBy('id_personal')->get();
        // $prestamo = DB::table('prestamos')
        //              ->select(DB::raw('sum(monto) as monto, id_personal, tipo, fecha'))
        //              ->groupBy('tipo')
        //              ->get();
//         $prestamo = DB::select( DB::raw("SELECT prestamos.*, datos_generales_personal.*
// FROM prestamos
// INNER JOIN datos_generales_personal
// ON prestamos.id_personal=datos_generales_personal.id
// ORDER BY prestamos.id_personal; "));
//         $pr = json_decode($prestamo);
//         $prestamos = array();
// foreach ($pr as $f) {
//         foreach ($f as $k => $v) {
//                 $prestamos[$k] = $v;
//         }
// }    

        
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

            Session::forget('valor');
            Session::put('valor', $suma);

        return view('prestamos.total', compact('prestamo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PrestamoRequest $request)
    {
        $per = Remuneracion::where('id_personal', $request['personal'])
               ->orderBy('id', 'desc')
               ->first();

        $mes = date('m');
        $pagosrealizados = DB::select('SELECT *, sum(monto_pagado) as monto FROM pagos_realizados WHERE id_personal = '.$request['personal'].' AND MONTH(fecha) = '.$mes.'');

        foreach ($pagosrealizados as $key) {
            $monto_pagos = $key->monto;
        }

        $prestamos = DB::select('SELECT *, sum(monto) as monto FROM prestamos WHERE id_personal = '.$request['personal'].' AND MONTH(fecha) = '.$mes.'');

        foreach ($prestamos as $key) {
            $monto_prestamos = $key->monto;
        }

        $pagadoTotal = $monto_prestamos-$monto_pagos;
        
        $suma = $per->sueldo_mens + $per->bono_responsabilidad;
        $descuento = ($suma*$per->descuento_iess)/100;
        $capital = $suma-$descuento;
        $pres = $capital-$pagadoTotal;

        if($request['monto']>$pres) {
            Session::flash('message-error', 'DISCULPE: NO SE PUDO REALIZAR SU PRESTAMO EN EL MES. EL MONTO INTRODUCIDO ES SUPERIOR A SU CAPITAL. EL MONTO MAX ES: '.$pres);
            $personal = Personal::all();
            return view('prestamos.create', compact('personal'));
        }else{
                $prestamo = new Prestamo();
                $prestamo->id_personal = $request['personal'];
                $prestamo->monto = $request['monto'];
                $prestamo->motivo = $request['motivo'];
                $prestamo->fecha = new \DateTime();
            if($request['tipo']=='P')
            {   
                $prestamo->tipo = 'Prestamo';
                
            }elseif ($request['tipo']=='A') {
                $prestamo->tipo = 'Anticipo';
            }
            $prestamo->save();
            Session::flash('message', 'PRESTAMO REGISTRADO CORRECTAMENTE');
            
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

            Session::forget('valor');
            Session::put('valor', $suma);

            return redirect()->action('PrestamosAnticiposController@index');
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
        //
    }

    public function listado(Request $request)
    {   
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


        $prestamo = DB::select('SELECT *,SUM(monto) as monto FROM prestamos WHERE id_personal = '.$request['persona'].' GROUP BY id_personal');


        foreach ($prestamo as $value) {
            $total = $value->monto;
        }

        $busqueda = DB::select('SELECT * FROM prestamos as pr INNER JOIN pagos as pa ON pr.id = pa.id_prestamo INNER JOIN datos_generales_personal as pe ON pe.id = pr.id WHERE pe.id = '.$request['persona'].'');

        $countBusqueda = count($busqueda);

        $total = isset($total) ? $total : '';
        if($countBusqueda==0)
        {
            Session::flash('message-error', 'ESTE USUARIO NO POSEE PAGO DE PRESTAMO');
            return redirect()->action('PrestamosAnticiposController@index');
        }

        // $prestamo = DB::table('prestamos')
        //              ->select(DB::raw('sum(monto) as monto, id_personal, tipo, fecha'))
        //              ->groupBy('tipo')
        //              ->get();
        
        $pres = Prestamo::where('id_personal', $request['persona'])->get();
        return view('prestamos.listado', ['total' => $total, 'prestamo' => $pres, 'capital' =>$monto_prestamos]);
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
