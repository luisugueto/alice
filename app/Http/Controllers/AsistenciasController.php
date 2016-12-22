<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Personal;
use App\FechasAsistencias;
use App\Asistencia;
use DB;
use Session;

class AsistenciasController extends Controller
{
    /*public function __construct(){
        if(Auth::user()->roles_id == 4){
            $this->middleware('recursohumano');
        }
        elseif(Auth::user()->roles_id == 2){
            $this->middleware('director');
        }
        else{
            $this->middleware('administrador');
        }
    }*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asistencia = Asistencia::all();
        $i = 0;
        if(count($asistencia)>0){
            foreach ($asistencia as $key => $asistencia) 
            {
               $asistencias[$i] = $asistencia->personal;
               $fecha[$i] = $asistencia; 

               $i++;
            }
        }
        $asistencias = (isset($asistencias)) ? $asistencias : [];

        return view('asistencias.index', compact('asistencias', 'fecha'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personal = Personal::all();
        return view('asistencias.create', compact('personal'));
    }

    public function salida()
    {
        $personal = Personal::all();
        return view('asistencias.salida', compact('personal'));
    }

    public function salidas(Request $request)
    {
        $asistencia = DB::select('SELECT *, a.id as id_asistencia FROM asistencia_personal as a INNER JOIN fechas_asistencias as f ON a.id_fecha = f.id WHERE a.id_personal = '.$request->id_personal.' AND f.fecha = "'.date('Y-m-d').'"');
        $verificarEntrada = count($asistencia);

        foreach ($asistencia as $key) {
            $id = $key->id_asistencia;
        }

        if($verificarEntrada == 0)
        {
            Session::flash('message-error', 'DISCULPE: USTED NO REGISTRO SU HORA DE ENTRADA, POR FAVOR REGISTRE');
            return redirect()->action('AsistenciasController@index');
        }
        else{
            $asistencias = Asistencia::find($id);
            $asistencias->salida = date('H:i:s');
            $asistencias->save();

            Session::flash('message', 'SALIDA REGISTRADA CORRECTAMENTE');
            return redirect()->action('AsistenciasController@index');
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fecha = FechasAsistencias::where('fecha', date('Y-m-d'))->count();
        if($fecha == 0)
        {
            $fechaa = new FechasAsistencias();
            $fechaa->fecha = date('Y-m-d');
            $fechaa->save();

            $FechasAsistencias = FechasAsistencias::all()->last();
            $verificarEntrada = Asistencia::where('id_personal', $request->id_personal)->where('id_fecha', $FechasAsistencias->id)->count();            

            if($verificarEntrada>0)
            {                
                Session::flash('message-error', 'DISCULPE: PERSONAL YA REGISTRADO EN LA ASISTENCIA');
                return redirect()->action('AsistenciasController@index');
            }
            else{
                $asistencias = new Asistencia();
                $asistencias->id_personal = $request->id_personal;
                $asistencias->id_fecha = $FechasAsistencias->id;
                $asistencias->entrada = date("H:i:s");
                $asistencias->save();
                Session::flash('message', 'ASISTENCIA REGISTRADA CORRECTAMENTE');
            }
        }
        else{
            $FechasAsistencias = FechasAsistencias::all()->last();
            $verificarEntrada = Asistencia::where('id_personal', $request->id_personal)->where('id_fecha', $FechasAsistencias->id)->count();            

            if($verificarEntrada>0)
            {                
                Session::flash('message-error', 'DISCULPE: PERSONAL YA REGISTRADO EN LA ASISTENCIA');
                return redirect()->action('AsistenciasController@index');
            }
            else{
                $asistencias = new Asistencia();
                $asistencias->id_personal = $request->id_personal;
                $asistencias->id_fecha = $FechasAsistencias->id;
                $asistencias->entrada = date("H:i:s");
                $asistencias->save();
                Session::flash('message', 'ASISTENCIA REGISTRADA CORRECTAMENTE');
            }
        }
        return redirect()->action('AsistenciasController@index');   
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
