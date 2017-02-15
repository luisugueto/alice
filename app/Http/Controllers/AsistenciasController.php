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

use App\Estudiante;
use App\Rubros;
use App\Facturacion;
use App\FacturasRubros;
use App\RubrosRealizados;
use App\FormasPago;

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
    
    private function horaMinutos($hora){
        list($horas, $minutos) = explode(':', $hora);
        $hora_en_minutos = ($horas*60)+$minutos;
        return $hora_en_minutos;  
    }
    
    private function diferencia_Horas($hora1,$hora2){ 
        $separar[1]=explode(':',$hora1); 
        $separar[2]=explode(':',$hora2); 
        $total_minutos_trasncurridos[1] = ($separar[1][0]*60)+$separar[1][1]; 
        $total_minutos_trasncurridos[2] = ($separar[2][0]*60)+$separar[2][1]; 
        $total_minutos_trasncurridos = $total_minutos_trasncurridos[1]-$total_minutos_trasncurridos[2]; 
        return $total_minutos_trasncurridos;
    }
    
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
                $docentes = Personal::find($request->id_personal);
                if($docentes->cargo->nombre == 'DOCENTE DE PLANTA' || $docentes->cargo->nombre == 'DOCENTE ROTATIVO')
                {
                    //  DOMINGO = 0; SABADO = 6;
                    $dias = array("0","1","2","3","4","5","6");
                    $bloque=DB::select('SELECT * FROM asignacion as a INNER JOIN datos_generales_personal as p ON p.id = a.id_prof INNER JOIN asignacion_bloques as b ON b.id_asig = a.id_asignatura INNER JOIN bloques as bl ON bl.id=b.id_bloque WHERE p.id = '.$request->id_personal.' AND bl.id_dia = '.$dias[date("w")].' ORDER BY b.id ASC LIMIT 1');
                    
                    $contadorBloque = count($bloque);
                    foreach ($bloque as $key) {
                        $bloqueInicial = $key->bloque;
                    }
                    if(!isset($bloqueInicial)){
                        Session::flash('message-error', 'DISCULPE: ESTE PERSONAL NO POSEE HORARIO');
                        return redirect()->action('AsistenciasController@index');
                    }
                        
                    $explode = explode(" - ", $bloqueInicial);
                    $diferencia = $this->diferencia_Horas(date('H:i:s'), $explode[0]); 
                    if($diferencia > 0){
                        // DB::insert('INSERT INTO retardo_asistencia(id_personal,fecha,retardo) VALUES('.$request->id_personal.','.date('Y-m-d').','.$diferencia.')');
                    }
                }
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
            $docentes = Personal::find($request->id_personal);
                if($docentes->cargo->nombre == 'DOCENTE DE PLANTA' || $docentes->cargo->nombre == 'DOCENTE ROTATIVO')
                {
                    //  DOMINGO = 0; SABADO = 6;
                    $dias = array("0","1","2","3","4","5","6");
                    $bloque=DB::select('SELECT * FROM asignacion as a INNER JOIN datos_generales_personal as p ON p.id = a.id_prof INNER JOIN asignacion_bloques as b ON b.id_asig = a.id_asignatura INNER JOIN bloques as bl ON bl.id=b.id_bloque WHERE p.id = '.$request->id_personal.' AND bl.id_dia = '.$dias[date("w")].' ORDER BY b.id ASC LIMIT 1');
                    
                    $contadorBloque = count($bloque);
                    foreach ($bloque as $key) {
                        $bloqueInicial = $key->bloque;
                    }
                    if(!isset($bloqueInicial)){
                        Session::flash('message-error', 'DISCULPE: ESTE PERSONAL NO POSEE CARGA ACADÉMICA');
                        return redirect()->action('AsistenciasController@index');
                    }
                        
                    $explode = explode(" - ", $bloqueInicial);
                    $diferencia = $this->diferencia_Horas(date('H:i:s'), $explode[0]); 
                    if($diferencia > 0){
                        // DB::insert('INSERT INTO retardo_asistencia(id_personal,fecha,retardo) VALUES('.$request->id_personal.',now(),'.$diferencia.')');
                    }
                }
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
    
    public function archivo()
    {
        return view('asistencias.forms.fields-upload');
    }

    public function upload(Request $request)
    {
        $archivo = $request->file('archivo');

        if(filesize($archivo) > 0){

            $nombre = $archivo->getClientOriginalName();
            $guardar = \Storage::disk('asistencias')->put($nombre,  \File::get($archivo));
            $public_path = public_path();
            $url = $public_path.'/file/'.$nombre;

            if (\Storage::disk('asistencias')->exists($nombre))
            {
                $archivoGuardado = file($url);

                unset($archivoGuardado[0]);

                foreach($archivoGuardado as $item){
                    list($fecha, $personal) = explode("\t", $item);
                    $fecha = explode(" ", $fecha);
                    
                    $fechas[] = $fecha[0];
                    $horas[] = $fecha[1];
                    $nro_personal[] = $personal;

                    $fechass[] = $fecha[0];
                    $horass[] = $fecha[1];
                    $nro_personals[] = $personal;
                    $fechas = array_reverse($fechass);
                    $horas = array_reverse($horass);
                    $nro_personal = array_reverse($nro_personals);
                }

                if(!empty($nro_personal)) {

                    foreach ($nro_personal as $key => $personal) {

                        $fechaExiste = FechasAsistencias::where('fecha', $fechas[$key])->exists();

                        $personalExiste = Personal::where('cedula', trim($personal))->first();
                        $fechaAsistencia = FechasAsistencias::where('fecha', $fechas[$key])->first();

                        
                        if (!$fechaExiste) {

                            $newFecha = new FechasAsistencias;
                            $newFecha->fecha = $fechas[$key];
                            $newFecha->save();

                            if (!empty($personalExiste)) {

                                foreach ($horas as $keyUp => $hora) {

                                    if (!$personalExiste->asistencias()->where('id_fecha', $newFecha->id)->exists()) {
 

                                        $personalExiste->asistencias()->saveMany([new Asistencia(['id_fecha' => $newFecha->id, 'entrada' => $horas[$key]])]);
                                    
                                        // 1-Administrativo 6:10 - 13
                                        // 2-Docente 6:30 - 13
                                        // 3-Obrero 6:20 - 14
                                        
                                        //RETARDO DE PERSONAL ADMINISTRATIVO
                                        if($personalExiste->tipo_registro == 1){
                                            $diferencia = $this->diferencia_Horas($horas[$key], date('06:10'));

                                            if($diferencia > 0){
                                                DB::insert('INSERT INTO retardo_asistencia(id_personal,id_fecha_asistencia,retardo) VALUES('.$personalExiste->id.','.$newFecha->id.','.$diferencia.')');
                                            }                                
                                        }

                                        //RETARDO DOCENTE PLANTA
                                        elseif($personalExiste->tipo_registro == 2 && $personalExiste->cargo->nombre == 'DOCENTE DE PLANTA'){
                                            $diferencia = $this->diferencia_Horas($horas[$key], date('06:30'));

                                            if($diferencia > 0){
                                                DB::insert('INSERT INTO retardo_asistencia(id_personal,id_fecha_asistencia,retardo) VALUES('.$personalExiste->id.','.$newFecha->id.','.$diferencia.')');
                                            }
                                        }

                                        // RETARDO DE DOCENTE ROTATIVO
                                        elseif($personalExiste->cargo->nombre == 'DOCENTE ROTATIVO'){

                                            $horaAc = $horas[$key];

                                            //  DOMINGO = 0; SABADO = 6;
                                            $dias = array("0","1","2","3","4","5","6");
                                            $sql = "SELECT * FROM asignacion as a INNER JOIN datos_generales_personal as p ON p.id = a.id_prof INNER JOIN asignacion_bloques as b ON b.id_asig = a.id_asignatura INNER JOIN bloques as bl ON bl.id=b.id_bloque WHERE p.id = ".$personalExiste->id." AND bl.id_dia = ".$dias[date('w')]." ORDER BY b.id ASC LIMIT 1";

                                            $bloque=DB::select($sql);
                                               
                                            foreach ($bloque as $key) {
                                                $bloqueInicial = $key->bloque;
                                            }
                                            
                                            $bloquee = explode(" - ", $bloqueInicial);
                                                                           
                                            $diferencia = $this->diferencia_Horas($horaAc, $bloquee[0]);
                                            if($diferencia > 0)  DB::insert('INSERT INTO retardo_asistencia(id_personal,id_fecha_asistencia,retardo) VALUES('.$personalExiste->id.','.$newFecha->id.','.$diferencia.')');                                          
                                        }
                                        //RETARDO DE PERSONAL ADMINISTRATIVO
                                        elseif($personalExiste->tipo_registro == 3){
                                            $diferencia = $this->diferencia_Horas($horas[$key], date('06:20'));

                                            if($diferencia > 0){
                                                DB::insert('INSERT INTO retardo_asistencia(id_personal,id_fecha_asistencia,retardo) VALUES('.$personalExiste->id.','.$newFecha->id.','.$diferencia.')');
                                            }
                                        }

                                    }
                                }
                            }

                        } else {

                            if (!empty($personalExiste)) {

                                foreach ($horas as $keyUp => $hora) {

                                    $asistencia = $personalExiste->asistencias()->where('id_fecha', $fechaAsistencia->id)->first();

                                    if (!empty($asistencia)) {

                                        $asistencia->salida = $horas[$key];
                                        $asistencia->save();

                                    } else {
                                        
                                        //RETARDO DE PERSONAL ADMINISTRATIVO
                                        if($personalExiste->tipo_registro == 1){
                                            $diferencia = $this->diferencia_Horas($horas[$key], date('06:10'));

                                            if($diferencia > 0){
                                                DB::insert('INSERT INTO retardo_asistencia(id_personal,id_fecha_asistencia,retardo) VALUES('.$personalExiste->id.','.$newFecha->id.','.$diferencia.')');
                                            }                                
                                        }
                                        //RETARDO DOCENTE PLANTA
                                        elseif($personalExiste->tipo_registro == 2 && $personalExiste->cargo->nombre == 'DOCENTE DE PLANTA'){
                                            $diferencia = $this->diferencia_Horas($horas[$key], date('06:30'));

                                            if($diferencia > 0){
                                                DB::insert('INSERT INTO retardo_asistencia(id_personal,id_fecha_asistencia,retardo) VALUES('.$personalExiste->id.','.$newFecha->id.','.$diferencia.')');
                                            }
                                        }

                                        //RETARDO DE PERSONAL ADMINISTRATIVO
                                        elseif($personalExiste->tipo_registro == 3){
                                            $diferencia = $this->diferencia_Horas($horas[$key], date('06:20'));

                                            if($diferencia > 0){
                                                DB::insert('INSERT INTO retardo_asistencia(id_personal,id_fecha_asistencia,retardo) VALUES('.$personalExiste->id.','.$newFecha->id.','.$diferencia.')');
                                            }
                                        }
 
                                        $personalExiste->asistencias()->saveMany([new Asistencia(['id_fecha' => $newFecha->id, 'entrada' => $horas[$key]])]);
                                    }
                                }
                            }
                        }
                    }
                    Session::flash('message', 'ASISTENCIAS REGISTRADAS EXITOSAMENTE.');
                    return redirect('asistencias');

                }else {

                    Session::flash('message-error', 'EL ARCHIVO QUE ESTA INTENTANDO CARGAR ESTA CORRUPTO VUELVA A INTENTARLO.');

                    return redirect()->back();
                }

            } else {

                Session::flash('message-error', 'ERROR AL GUARDAR EL ARCHIVO VUELVA A INTENTARLO NUEVAMENTE.');

                return redirect()->back();
            }

        } else {

            Session::flash('message-error', 'EL ARCHIVO QUE ESTA INTENTANDO CARGAR ESTA VACÍO VUELVA A INTENTARLO.');

            return redirect()->back();
         } 
    }
}