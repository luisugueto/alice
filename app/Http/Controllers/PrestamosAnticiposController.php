<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\Prestamo;
use App\Remuneracion;
use App\Http\Requests;
use Session;
use DB;

class PrestamosAnticiposController extends Controller
{
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

        return view('prestamos.total', compact('prestamo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $per = Remuneracion::where('id_personal', $request['personal'])
               ->orderBy('id', 'desc')
               ->first();

        $suma = $per->sueldo_mens + $per->bono_responsabilidad + $per->descuento_iess;
        if($request['monto']>$suma) {
            Session::flash('message-error', 'Error: Monto Superior a su Sueldo.');
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
                $personal = Personal::all();
                return view('prestamos.create', compact('personal'));
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

        $prestamo = DB::select('SELECT *,SUM(monto) as monto FROM prestamos WHERE id_personal = '.$request['persona'].' GROUP BY id_personal');

        foreach ($prestamo as $value) {
            $total = $value->monto;
        }
        // $prestamo = DB::table('prestamos')
        //              ->select(DB::raw('sum(monto) as monto, id_personal, tipo, fecha'))
        //              ->groupBy('tipo')
        //              ->get();
        
        $pres = Prestamo::where('id_personal', $request['persona'])->get();
        return view('prestamos.listado', ['total' => $total, 'prestamo' => $pres]);
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
