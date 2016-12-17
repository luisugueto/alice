<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personal;
use App\User;
use App\InformacionAcademica;
use App\Remuneracion;
use App\Cargo;
use App\Tipo;
use App\Http\Requests;
use App\Http\Requests\PersonalRequest;
use Session;
use Response;
use Redirect;
use DB;
use PDO;

class PersonalController extends Controller
{
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
        $cargo = Cargo::lists('nombre', 'id');
        $tipo = Tipo::lists('tipo_empleado', 'id');

        return view('personal.nuevopersonal', compact('cargo', 'tipo'));
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
        $per->edo_civil = $request['edo_civil'];
        $per->estado_actual = $request['estado_actual'];
        $per->tipo_registro = $request['tipo_registro'];
        $per->especialidad = strtoupper($request['especialidad']);
        $per->direccion = strtoupper($request['direccion']);
        $per->telefono = $request['telefono'];
        $per->correo = strtolower($request['correo']);
        $per->id_cargo = $request['id_cargo'];
        $per->ingreso_notas = 1;
        $per->id_tipo = $request['tipo_registro'];
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
        $ren->descuento_iess = $request['descuento_iess'];
        $ren->bono_responsabilidad  = $request['bono_responsabilidad'];
        if($request['horas_extras']=='on') $ren->horas_extras  = 'Y';
        else $ren->horas_extras  = 'N';
        $ren->cuenta_bancaria  = $request['cuenta_bancaria'];
        if($request['devolver_fondos']=='on') $ren->devolver_fondos = 'Y';
        else $ren->devolver_fondos = 'N';
        $ren->save();

        if($request['seleccionar']=='on'){
            $user = new User();
            $user->name = strtoupper($request['nombres']);
            $user->email = strtolower($request['correo']);
            $user->password = bcrypt($request['clave']);
            $user->roles_id = '3';
            $user->save();
        }

        return Redirect::to('personal.personal');
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
    public function update(Request $request, $id)
    {
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
        $per->id_cargo = $request['id_cargo'];
        $per->ingreso_notas = 1;
        $per->id_tipo = $request['tipo_registro'];
        if($request['seleccionar']=='on'){
            $per->clave = $request['clave'];
        }else $per->clave = '';
        $per->save();


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

        Session::put('message', 'Usuario Editado Correctamente');

        return redirect::to('personal.personal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Personal::destroy($id);
        InformacionAcademica::where('id_personal', $id)->delete();
        Session::put('message', 'Personal Eliminado Correctamente');

        return redirect::to('/personal');
    }
}
