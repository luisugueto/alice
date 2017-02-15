<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\User;
use App\InformacionAcademica;
use App\Remuneracion;
use App\Cargo;
use App\Tipo;
use App\Prestamo;
use App\Http\Requests;
use App\Http\Requests\PersonalRequest;
use Session;
use Response;
use Redirect;
use Mail;
use DB;
use PDO;
use Auth;
use PDF;

class PersonalController extends Controller
{
    public function __construct(){
        /*
        if(Auth::user()->roles_id == 4){
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
        $personal = Personal::all();
        return view('personal.personal', compact('personal'));
    }

    public function nuevo()
    {
        $tipo = Tipo::lists('tipo_empleado', 'id');
        return view('personal.nuevopersonal', compact('tipo'));
    }

    public function control()
    {
        $personal = Personal::orderBy('id', 'asc')->groupBy('id')->get();
        return view('personal.control', compact('personal'));
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

    public function getCargos(Request $request, $id)
    {
        if ($request->ajax()) {
           return $cargos = Cargo::where('id_tipo_empleado', $id)->get();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonalRequest $request)
    {
        // dd($request->all());
        $per = new Personal();
        $per->codigo_pesonal = $request['codigo_pesonal'];
        $per->nombres = strtoupper($request['nombres']);
        $per->apellido_paterno = strtoupper($request['apellido_paterno']);
        $per->apellido_materno = strtoupper($request['apellido_materno']);
        $per->cedula = $request['cedula'];
        $per->fecha_nacimiento = $request['fecha_nacimiento'];
        $per->fecha_ingreso = $request['fecha_ingreso'];
        $per->edad = $request['edad'];
        $per->genero = strtoupper($request['genero']);
        $per->edo_civil = strtoupper($request['edo_civil']);
        $per->estado_actual = strtoupper($request['estado_actual']);
        $per->tipo_registro = $request['tipo_registro'];
        $per->especialidad = strtoupper($request['especialidad']);
        $per->direccion = strtoupper($request['direccion']);
        $per->telefono = $request['telefono'];
        $per->correo = strtolower($request['correo']);
        $per->id_cargo = $request['id_cargo'];
        $per->ingreso_notas = 1;
        $data['correo'] = $request['correo'];
        define('correo', $request['correo']);
        define('nombres', $request['nombres']);
        $data['clave'] = $request['clave'];


        if($request['seleccionar']=='on'){
            $per->clave = $request['clave'];
        }else $per->clave = '';
        $per->save();

        $per = Personal::where('correo', $request['correo'])
               ->orderBy('id', 'desc')
               ->get();
        foreach ($per as $p) {
            $id = $p->id;
        }

        $ina = new InformacionAcademica();
        $ina->id_personal = $id;
        $ina->primaria = strtoupper($request['primaria']);
        $ina->secundaria = strtoupper($request['secundaria']);
        $ina->superior = strtoupper($request['superior']);
        $ina->titulo = strtoupper($request['titulo']);
        $ina->cursos = strtoupper($request['cursos']);
        $ina->historial_laboral = strtoupper($request['historial_laboral']);
        $ina->save();

        $ren = new Remuneracion();
        $ren->id_personal = $id;
        $ren->sueldo_mens  = $request['sueldo_mens'];
        $ren->descuento_iess = (isset($request['descuento_iess'])) ? $request['descuento_iess'] : '';
        $ren->bono_responsabilidad  = $request['bono_responsabilidad'];
        if($request['horas_extras']=='on') $ren->horas_extras  = 'Y';
        else $ren->horas_extras  = 'N';
        $ren->cuenta_bancaria  = $request['cuenta_bancaria'];
        if($request['devolver_fondos']=='on') $ren->devolver_fondos = 'Y';
        else $ren->devolver_fondos = 'N';
        $ren->save();

        if($request['seleccionar']=='on'){
            if($request['tipo_registro']==2){
                $user = new User();
                $user->name = strtoupper($request['nombres']);
                $user->email = strtolower($request['correo']);
                $user->password = bcrypt($request['clave']);
                $user->roles_id = '3';
                $user->save();

            }
        }
        if($request['tipo_registro']==2){
        //      \Mail::send('emails.message', $data, function($message)
        // {
        //     $message->to(correo)->subject('Usuario Aplicación María Montessori');;
        // });
            Session::flash('message', 'DOCENTE REGISTRADO CORRECTAMENTE, RECIBIRÁ UN CORREO CON SU USUARIO Y CONTRASEÑA DE ACCESO');
        }
        else{
            Session::flash('message', 'PERSONAL REGISTRADO CORRECTAMENTE');
        //  \Mail::send('emails.message', $data, function($message)
        // {
        //     $message->to(correo)->subject('Usuario Aplicación María Montessori');;
        // });
        }
            return redirect()->route('personal.index');
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
        define('id', $id);
        DB::connection()->setFetchMode(PDO::FETCH_ASSOC);

        $personal = DB::table('datos_generales_personal')
            ->join('informacion_academica', 'informacion_academica.id_personal', '=', 'datos_generales_personal.id')
            ->join('remuneracion', 'remuneracion.id_personal', '=', 'informacion_academica.id')
            ->where('remuneracion.id_personal', '=', id)
            ->first();

        $cargo = Cargo::lists('nombre', 'id');
        $tipo = Tipo::lists('tipo_empleado', 'id');

        return view('personal.edit', compact('cargo', 'tipo', 'personal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PersonalRequest $request, $id)
    {
            $personal = Personal::where('id',$id)->first();
            $user = User::where('email', $personal->correo)->exists();
            if($user)
            {
                $user1 = User::where('email', $personal->correo)->first();
            }

            $per = Personal::find($id);
            $per->codigo_pesonal = $request['codigo_pesonal'];
            $per->nombres = strtoupper($request['nombres']);
            $per->apellido_paterno = strtoupper($request['apellido_paterno']);
            $per->apellido_materno = strtoupper($request['apellido_materno']);
            $per->cedula = $request['cedula'];
            $per->fecha_nacimiento = $request['fecha_nacimiento'];
            $per->fecha_ingreso = $request['fecha_ingreso'];
            $per->edad = $request['edad'];
            $per->genero = strtoupper($request['genero']);
            $per->edo_civil = $request['edo_civil'];
            $per->estado_actual = $request['estado_actual'];
            $per->tipo_registro = $request['tipo_registro'];
            $per->especialidad = strtoupper($request['especialidad']);
            $per->direccion = strtoupper($request['direccion']);
            $per->telefono = $request['telefono'];
            $per->correo = strtolower($request['correo']);
            $per->ingreso_notas = 1;

            if($request['seleccionar']=='on'){
                $per->clave = $request['clave'];
            }else {
                $per->clave = '';
                $per->save();
            }

            if($user)
            {
                $contar = User::where('email', $personal->correo)->where('id', '!=', $user1->id)->count();
                if($contar == 0){
                    $usuario = User::find($user1->id);
                    $usuario->email = $request['correo'];
                    $usuario->save();
                }
            }

            $ina = InformacionAcademica::find($id);
            $ina->primaria = strtoupper($request['primaria']);
            $ina->secundaria = strtoupper($request['secundaria']);
            $ina->superior = strtoupper($request['superior']);
            $ina->titulo = strtoupper($request['titulo']);
            $ina->cursos = strtoupper($request['cursos']);
            $ina->historial_laboral = strtoupper($request['historial_laboral']);
            $ina->save();

            $ren = Remuneracion::find($id);
            $ren->sueldo_mens  = $request['sueldo_mens'];
            $ren->descuento_iess = $request['descuento_iess'];
            $ren->bono_responsabilidad  = $request['bono_responsabilidad'];
            if($request['horas_extras']=='on') $ren->horas_extras  = 'Y';
            else $ren->horas_extras  = 'N';
            $ren->cuenta_bancaria  = $request['cuenta_bancaria'];
            if($request['devolver_fondos']=='on') $ren->devolver_fondos = 'Y';
            else $ren->devolver_fondos = 'N';
            $ren->save();

            Session::flash('message', 'USUARIO EDITADO CORRECTAMENTE');

            $cargaAcademica = DB::select('SELECT * FROM asignacion WHERE id_prof = '.$id.'');
            $contarCarga = count($cargaAcademica);
            $verificarCargo = Personal::where('id', $id)->first();
            if($request['id_cargo'] != $verificarCargo->id_cargo){
                if($contarCarga > 0){
                    Session::flash('message-error', 'DISCULPE: NO SE PUDO MODIFICAR EL CARGO. ESTE PERSONAL POSEE CARGA ACADÉMICA');
                   return redirect()->action('PersonalController@index');
                }else{
                    $per = Personal::find($id);
                    $per->id_cargo = $request['id_cargo'];
                    $per->save();
                    return redirect()->action('PersonalController@index');
                }
            }

        return redirect()->action('PersonalController@index');
    }

    public function recibo($id){
      $firstDay = explode('-', $this->_data_first_month_day());
      $lastDay = explode('-', $this->_data_last_month_day());

      $personal = Personal::find($id);
      $capital = remuneracion($id);
      $prestamos = totalPrestamos($id);
      $mes = date('m');
      $prestamoss = DB::select('SELECT * FROM prestamos WHERE id_personal = '.$id.' AND MONTH(fecha) = '.$mes.'');
      $minutosRetardo = retardoAsistencia($id);
      $retardoAsistencia = retardoAsistencia($id) * descuentosPersonal($personal->cargo->empleado->id);
      $pagoTotal = (remuneracion($id)-totalPrestamos($id)-retardoAsistencia($id) * descuentosPersonal($personal->cargo->empleado->id));

      $datos['firstDay'] = $firstDay[2].'-'.$firstDay['1'].'-'.$firstDay[0];
      $datos['lastDay'] = $lastDay[2].'-'.$lastDay['1'].'-'.$lastDay[0];
      $datos['nombres'] = $personal->nombres;
      $datos['apellido'] = $personal->apellido_paterno;
      $datos['cedula'] = $personal->cedula;
      $datos['cargo'] = $personal->cargo->nombre;
      $datos['capital'] = $capital;
      $datos['minutosRetardo'] = $minutosRetardo;
      $datos['retardo'] = $retardoAsistencia;
      $datos['prestamos'] = $prestamos;
      $datos['contadorPrestamos'] = count($prestamoss);
      $datos['pagosTotal'] = $pagoTotal;

      $pdf = PDF::loadView('pdf.pago.index', $datos);

      return $pdf->download('RECIBO DE PAGO '.$personal->nombres.' '.$personal->apellido_paterno.'-'.date('Y-m-d').'.pdf');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $cargaAcademica = DB::select('SELECT * FROM asignacion WHERE id_prof = '.$id.'');
        $contarCarga = count($cargaAcademica);
        if($contarCarga > 0){
            Session::flash('message-error', 'DISCULPE: NO SE PUEDE ELIMINAR EL PERSONAL. ESTE PERSONAL POSEE CARGA ACADÉMICA');
            return redirect()->action('PersonalController@index');
        }else{
            Personal::destroy($id);
            InformacionAcademica::where('id_personal', $id)->delete();
            Session::flash('message', 'PERSONAL ELIMINADO CORRECTAMENTE');
            return redirect()->action('PersonalController@index');
        }
    }

    /** Actual month last day **/
    private function _data_last_month_day() {
      $month = date('m');
      $year = date('Y');
      $day = date("d", mktime(0,0,0, $month+1, 0, $year));

      return date('Y-m-d', mktime(0,0,0, $month, $day, $year));
  }

  /** Actual month first day **/
  private function _data_first_month_day() {
      $month = date('m');
      $year = date('Y');
      return date('Y-m-d', mktime(0,0,0, $month, 1, $year));
  }

}
