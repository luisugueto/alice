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
    public function store(PersonalRequest $request)
    {
        $per = new Personal();
        $per->codigo_pesonal = $request['codigo_pesonal'];
        $per->nombres = $request['nombres'];
        $per->apellido_paterno = $request['apellido_paterno'];
        $per->apellido_materno = $request['apellido_materno'];
        $per->cedula = $request['cedula'];
        $per->fecha_nacimiento = $request['fecha_nacimiento'];
        $per->fecha_ingreso = $request['fecha_ingreso'];
        $per->edad = $request['edad'];
        $per->genero = $request['genero'];
        $per->edo_civil = $request['edo_civil'];
        $per->estado_actual = $request['estado_actual'];
        $per->tipo_registro = $request['tipo_registro'];
        $per->especialidad = $request['especialidad'];
        $per->direccion = $request['direccion'];
        $per->telefono = $request['telefono'];
        $per->correo = $request['correo'];
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
        $ina->primaria = $request['primaria'];
        $ina->secundaria = $request['secundaria'];
        $ina->superior = $request['superi'];
        $ina->titulo = $request['titulos'];
        $ina->cursos = $request['cursos'];
        $ina->historial_laboral = $request['historia'];
        $ina->save();

        $ren = new Remuneracion();
        $ren->id_personal = $id;
        $ren->sueldo_1era_quincena = $request['prQuincena'];
        $ren->sueldo_2da_quincena = $request['seQuincena'];
        $ren->sueldo_mens  = $request['sueldoMensual'];
        $ren->iess_patronal = $request['ieePatronal'];
        $ren->iess_personal = $request['ieePersonal'];
        $ren->descuento_iess = $request['descuento'];
        $ren->bono_responsabilidad  = $request['bono'];
        $ren->horas_extras  = $request['horasExtras'];
        $ren->cuenta_bancaria  = $request['cuenta'];
        $ren->devolver_fondos = $request['devolverFondos'];
        $ren->save();

        if($request['seleccionar']=='on'){
            $user = new User();
            $user->name = $request['nombres'];
            $user->email = $request['correo'];
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
        $cargo = Cargo::lists('nombre', 'id');
        $tipo = Tipo::lists('tipo_empleado', 'id');
        $personal = Personal::find($id);

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
        $per->fill($request->all());
        $per->save();
        Session::put('message', 'Usuario Editado Correctamente');

        return redirect::to('/personal');
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
