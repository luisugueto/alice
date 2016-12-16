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
use Session;
use Response;
use Redirect;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personal = Personal::paginate(5);
        return view('personal.personal', compact('personal'));
    }

    public function nuevo()
    {
        $cargo = Cargo::all();
        $tipo = Tipo::all();
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
        $per->codigo_pesonal = $request['codigo'];
        $per->nombres = $request['nombres'];
        $per->apellido_paterno = $request['apellidop'];
        $per->apellido_materno = $request['apellidom'];
        $per->cedula = $request['cedula'];
        $per->fecha_nacimiento = $request['nacimiento'];
        $per->fecha_ingreso = $request['ingreso'];
        $per->edad = $request['edad'];
        $per->genero = $request['sexo'];
        $per->edo_civil = $request['ecivil'];
        $per->estado_actual = $request['eactual'];
        $per->tipo_registro = $request['tiporeg'];
        $per->especialidad = $request['especialidad'];
        $per->direccion = $request['direccion'];
        $per->telefono = $request['telefono'];
        $per->correo = $request['correo'];
        $per->id_cargo = $request['cargo'];
        $per->ingreso_notas = 1;
        $per->id_tipo = $request['tiporeg'];
        $per->clave = $request['clave'];
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


        $user = new User();
        $user->name = $request['nombres'];
        $user->email = $request['correo'];
        $user->password = bcrypt($request['clave']);
        $user->save();

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
