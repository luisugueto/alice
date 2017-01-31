<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Estudiante;
use App\Representante;
use App\Facturacion;
use App\Documentacion;
use App\DatosMedico;
use App\Padres;
use App\Cursos;
use App\Http\Requests\EstudianteRequest;
use App\Http\Requests\CedulaEstudianteRequest;
use Auth;
use Session;
use DB;
use PDO;
use Storage;

class EstudiantesController extends Controller
{
    public function __construct(){
        /*if(Auth::user()->roles_id == 5){
            $this->middleware('dace');
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
    	$estudiantes = Estudiante::all();

        return view('estudiantes.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CedulaEstudianteRequest $request)
    {

    	$representante = Representante::where('id', $request->representante)->first();

    	if(!empty($representante)) 
    	{
            if($request->padre == 0)
            {
                $padre = false;
            
            }else{

                $padre = Padres::find($request->padre);
            }

            if($request->madre == 0)
            {
                $madre = false;
            
            }else{

                $madre = Padres::find($request->madre);
            }

            $cedula = $request->nacionalidad.$request->cedula;

            $existe = Estudiante::where('cedula', $cedula)->exists();

            if($existe)
            {

                Session::flash('message-error', 'ESTUDIANTE CON NÚMERO DE CÉDULA '.$cedula.' YA SE ENCUENTRA REGISTRADO');

                return redirect('estudiantes');

            }else{
    		  
                $cursos = Cursos::lists('curso', 'id');

                return view('estudiantes.create', compact('representante', 'padre', 'madre', 'cedula', 'cursos'));
            }

    	}else{

            Session::flash('message-error', 'ERROR AL BUSCAR ESTUDIANTE');

        	return redirect('estudiantes');

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

        if($request->capacidad == 'Si')
        {
            $capacidad_especial = $request->capacidad_especial;
        
        }else{

            $capacidad_especial = 'NINGUNA';
        }

        if($request->patologia_e == 'Si')
        {
            $patologia = $request->patologia;
        
        }else{

            $patologia = 'NINGUNA';
        }

        if($request->medicinas_e == 'Si')
        {
            $medicinas_contraindicadas = $request->medicinas_e;
        
        }else{

            $medicinas_contraindicadas = 'NINGUNA';
        }

        if($request->discapacidad == 'Si')
        {
            $porcentaje_discapacidad = $request->discapacidad;
        
        }else{

            $porcentaje_discapacidad = 0;
        }

        if($request->alergico == 'Si')
        {
            $alergico_a = $request->alergico;
        
        }else{

            $alergico_a = 'NADA';
        }

        $foto = $request->file('foto');

        $this->validate($request, 
        [
            'apellido_paterno' => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'nacionalidad'     => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'genero'           => 'required',
            'direccion'        => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'codigo_matricula' => 'required',
            'apellido_materno' => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'provincia'        => 'required',
            'estado_actual'    => 'required',
            'telefono'         => 'required|digits_between:10,11',
            'fecha_registro'   => 'required',
            'nombres'          => 'required',
            'ciudad_natal'     => 'required',
            'tipo_registro'    => 'required',
            'correo'           => 'required|unique:datos_generales_estudiante',
            'fecha_nacimiento' => 'required',
            //
            'grupo_sanguineo'           => 'required',
            'capacidad_especial'        => 'regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'medicinas_contraindicadas' => 'regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'alergico_a'                => 'regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'patologia'                 => 'regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            //
            'detalles'                  => 'regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            //
            'codigo'                    => 'regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'titulo'                    => 'regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'digitalizado'              => 'dimensions:min_width=809,min_height=1138',

        ]);

        if ($request->padre == 'on' AND $request->padre2 == 'on') 
        {

            $this->validate($request, 
            [
                'cedula_pa'        => 'required|digits_between:8,10', 
                'nombres_pa'       => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
                'lugar_trabajo'    => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
                'direccion_pa'     => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
                'telefono_pa'      => 'required|digits_between:10,11',
                'correo_pa'        => 'required|email|unique:datos_padres,correo_pa',
                'nacionalidad_pa'  => 'required',
                'cedula_ma'        => 'required|digits_between:8,10', 
                'nombres_ma'       => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
                'lugar_trabajo_ma' => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
                'direccion_ma'     => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
                'telefono_ma'      => 'required|digits_between:10,11',
                'correo_ma'        => 'required|email|unique:datos_padres,correo_pa',
                'nacionalidad_ma'  => 'required'
            ]);
            
            $cedula_padre = $request->nacionalidad_padre.$request->cedula_pa;
            $cedula_madre = $request->nacionalidad_madre.$request->cedula_ma;

            $padre = Padres::where('cedula_pa', $cedula_padre)->first();
            $madre = Padres::where('cedula_pa', $cedula_madre)->first();

                if(!empty($padre) AND !empty($madre))
                {
                    $estudiante = Estudiante::create($request->all());

                    $padre->estudiante()->attach($estudiante);
                    $madre->estudiante()->attach($estudiante);

                    $medicos = new DatosMedico;
                    $medicos->id_estudiante = $estudiante->id;
                    $medicos->grupo_sanguineo = $request->grupo_sanguineo;
                    $medicos->peso = $request->peso;
                    $medicos->altura = $request->altura;
                    $medicos->capacidad_especial = $capacidad_especial;
                    $medicos->porcentaje_discapacidad = $porcentaje_discapacidad;
                    $medicos->medicinas_contraindicadas = $medicinas_contraindicadas;
                    $medicos->alergico_a = $alergico_a;
                    $medicos->patologia = $patologia;
                    $medicos->save();

                    Session::flash('message', 'ESTUDIANTE REGISTRADO EXITOSAMENTE');

                    return redirect('estudiantes');
                
                    }elseif(!empty($padre) OR !empty($madre)){

                        if(!empty($padre))
                        {
                            $this->validate($request, 
                            [
                                'cedula_pa'        => 'required|digits_between:8,10', 
                                'nombres_pa'       => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
                                'lugar_trabajo'    => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
                                'direccion_pa'     => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
                                'telefono_pa'      => 'required|digits_between:10,11',
                                'correo_pa'        => 'required|email|unique:datos_padres,correo_pa',
                                'nacionalidad_pa'  => 'required'
                            ]);

                            $estudiante = Estudiante::create($request->all());

                            $padre = new Padres;

                            $padre->cedula_pa = $request->cedula_pa;
                            $padre->nombres_pa = $request->nombres_pa;
                            $padre->lugar_trabajo = $request->lugar_trabajo;
                            $padre->direccion_pa = $request->direccion_pa;
                            $padre->telefono_pa = $request->telefono_pa;
                            $padre->correo_pa = $request->nacionalidad_pa;
                            $padre->nivel_educacion = $request->nivel_educacion;
                            $padre->save();

                            $padre->estudiante()->attach($estudiante);
                            $madre->estudiante()->attach($estudiante);

                            $medicos = new DatosMedico;
                            $medicos->id_estudiante = $estudiante->id;
                            $medicos->grupo_sanguineo = $request->grupo_sanguineo;
                            $medicos->peso = $request->peso;
                            $medicos->altura = $request->altura;
                            $medicos->capacidad_especial = $capacidad_especial;
                            $medicos->porcentaje_discapacidad = $porcentaje_discapacidad;
                            $medicos->medicinas_contraindicadas = $medicinas_contraindicadas;
                            $medicos->alergico_a = $alergico_a;
                            $medicos->patologia = $patologia;
                            $medicos->save();
            
                            Session::flash('message', 'ESTUDIANTE REGISTRADO EXITOSAMENTE');

                            return redirect('estudiantes');

                        }else{

                            $this->validate($request, 
                            [
                                'cedula_ma'        => 'required|digits_between:8,10', 
                                'nombres_ma'       => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
                                'lugar_trabajo_ma' => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
                                'direccion_ma'     => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
                                'telefono_ma'      => 'required|digits_between:10,11',
                                'correo_ma'        => 'required|email|unique:datos_padres,correo_pa',
                                'nacionalidad_ma'  => 'required',
                            ]);

                            $estudiante = Estudiante::create($request->all());

                            $madre = new Padres;

                            $madre->cedula_pa = $request->cedula_ma;
                            $madre->nombres_pa = $request->nombres_ma;
                            $madre->lugar_trabajo = $request->lugar_trabajo_ma;
                            $madre->direccion_pa = $request->direccion_ma;
                            $madre->telefono_pa = $request->telefono_ma;
                            $madre->correo_pa = $request->nacionalidad_ma;
                            $madre->nivel_educacion = $request->nivel_educacion_ma;
                            $madre->save();

                            $madre->estudiante()->attach($estudiante);
                            $padre->estudiante()->attach($estudiante);

                            $medicos = new DatosMedico;
                            $medicos->id_estudiante = $estudiante->id;
                            $medicos->grupo_sanguineo = $request->grupo_sanguineo;
                            $medicos->peso = $request->peso;
                            $medicos->altura = $request->altura;
                            $medicos->capacidad_especial = $capacidad_especial;
                            $medicos->porcentaje_discapacidad = $porcentaje_discapacidad;
                            $medicos->medicinas_contraindicadas = $medicinas_contraindicadas;
                            $medicos->alergico_a = $alergico_a;
                            $medicos->patologia = $patologia;
                            $medicos->save();

                            Session::flash('message', 'ESTUDIANTE REGISTRADO EXITOSAMENTE');

                            return redirect('estudiantes');
                        }

                    }else{

                        $estudiante = Estudiante::create($request->all());
                        
                        $madre->estudiante()->attach($estudiante);
                        $padre->estudiante()->attach($estudiante);

                        $medicos = new DatosMedico;
                        $medicos->id_estudiante = $estudiante->id;
                        $medicos->grupo_sanguineo = $request->grupo_sanguineo;
                        $medicos->peso = $request->peso;
                        $medicos->altura = $request->altura;
                        $medicos->capacidad_especial = $capacidad_especial;
                        $medicos->porcentaje_discapacidad = $porcentaje_discapacidad;
                        $medicos->medicinas_contraindicadas = $medicinas_contraindicadas;
                        $medicos->alergico_a = $alergico_a;
                        $medicos->patologia = $patologia;
                        $medicos->save();

                        Session::flash('message', 'ESTUDIANTE REGISTRADO EXITOSAMENTE');

                        return redirect('estudiantes');
                    }

        }elseif($request->padre == 'on' OR $request->padre2 == 'on'){

            $cedula_padre = $request->nacionalidad_padre.$request->cedula_pa;
            $cedula_madre = $request->nacionalidad_madre.$request->cedula_ma;

            $padre = Padres::where('cedula_pa', $cedula_padre)->first();
            $madre = Padres::where('cedula_pa', $cedula_madre)->first();


            if($request->padre == 'on')
            {
                $this->validate($request, 
                [
                    'cedula_pa'        => 'required|digits_between:8,10', 
                    'nombres_pa'       => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
                    'lugar_trabajo'    => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
                    'direccion_pa'     => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
                    'telefono_pa'      => 'required|digits_between:10,11',
                    'correo_pa'        => 'required|email|unique:datos_padres,correo_pa',
                    'nacionalidad_pa'  => 'required'
                ]);

                if(!empty($padre))
                {
                    $estudiante = Estudiante::create($request->all());
                    $padre->estudiante()->attach($estudiante);

                    $medicos = new DatosMedico;
                    $medicos->id_estudiante = $estudiante->id;
                    $medicos->grupo_sanguineo = $request->grupo_sanguineo;
                    $medicos->peso = $request->peso;
                    $medicos->altura = $request->altura;
                    $medicos->capacidad_especial = $capacidad_especial;
                    $medicos->porcentaje_discapacidad = $porcentaje_discapacidad;
                    $medicos->medicinas_contraindicadas = $medicinas_contraindicadas;
                    $medicos->alergico_a = $alergico_a;
                    $medicos->patologia = $patologia;
                    $medicos->save();

                    Session::flash('message', 'ESTUDIANTE REGISTRADO EXITOSAMENTE');

                    return redirect('estudiantes');
                
                }else{

                    $estudiante = Estudiante::create($request->all());

                    $padre = new Padres;

                    $padre->cedula_pa = $request->cedula_pa;
                    $padre->nombres_pa = $request->nombres_pa;
                    $padre->lugar_trabajo = $request->lugar_trabajo;
                    $padre->direccion_pa = $request->direccion_pa;
                    $padre->telefono_pa = $request->telefono_pa;
                    $padre->correo_pa = $request->nacionalidad_pa;
                    $padre->nivel_educacion = $request->nivel_educacion;
                    $padre->save();

                    $padre->estudiante()->attach($estudiante);

                    $medicos = new DatosMedico;
                    $medicos->id_estudiante = $estudiante->id;
                    $medicos->grupo_sanguineo = $request->grupo_sanguineo;
                    $medicos->peso = $request->peso;
                    $medicos->altura = $request->altura;
                    $medicos->capacidad_especial = $capacidad_especial;
                    $medicos->porcentaje_discapacidad = $porcentaje_discapacidad;
                    $medicos->medicinas_contraindicadas = $medicinas_contraindicadas;
                    $medicos->alergico_a = $alergico_a;
                    $medicos->patologia = $patologia;
                    $medicos->save();

                    Session::flash('message', 'ESTUDIANTE REGISTRADO EXITOSAMENTE');

                    return redirect('estudiantes');

                }

            }else{

                $this->validate($request, 
                [
                    'cedula_ma'        => 'required|digits_between:8,10', 
                    'nombres_ma'       => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
                    'lugar_trabajo_ma' => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
                    'direccion_ma'     => 'required|regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
                    'telefono_ma'      => 'required|digits_between:10,11',
                    'correo_ma'        => 'required|email|unique:datos_padres,correo_pa',
                    'nacionalidad_ma'  => 'required',
                ]);

                if(!empty($madre))
                {
                    $estudiante = Estudiante::create($request->all());
                    $madre->estudiante()->attach($estudiante);  

                    $medicos = new DatosMedico;                        $medicos->id_estudiante = $estudiante->id;
                    $medicos->grupo_sanguineo = $request->grupo_sanguineo;
                    $medicos->peso = $request->peso;
                    $medicos->altura = $request->altura;
                    $medicos->capacidad_especial = $capacidad_especial;
                    $medicos->porcentaje_discapacidad = $porcentaje_discapacidad;
                    $medicos->medicinas_contraindicadas = $medicinas_contraindicadas;
                    $medicos->alergico_a = $alergico_a;
                    $medicos->patologia = $patologia;
                    $medicos->save();

                    Session::flash('message', 'ESTUDIANTE REGISTRADO EXITOSAMENTE');

                    return redirect('estudiantes');
                
                }else{

                    $estudiante = Estudiante::create($request->all());

                    $madre = new Padres;

                    $madre->cedula_pa = $request->cedula_ma;
                    $madre->nombres_pa = $request->nombres_ma;
                    $madre->lugar_trabajo = $request->lugar_trabajo_ma;
                    $madre->direccion_pa = $request->direccion_ma;
                    $madre->telefono_pa = $request->telefono_ma;
                    $madre->correo_pa = $request->nacionalidad_ma;
                    $madre->nivel_educacion = $request->nivel_educacion_ma;
                    $madre->save();

                    $madre->estudiante()->attach($estudiante);
                    
                    $medicos = new DatosMedico;
                    $medicos->id_estudiante = $estudiante->id;
                    $medicos->grupo_sanguineo = $request->grupo_sanguineo;
                    $medicos->peso = $request->peso;
                    $medicos->altura = $request->altura;
                    $medicos->capacidad_especial = $capacidad_especial;
                    $medicos->porcentaje_discapacidad = $porcentaje_discapacidad;
                    $medicos->medicinas_contraindicadas = $medicinas_contraindicadas;
                    $medicos->alergico_a = $alergico_a;
                    $medicos->patologia = $patologia;
                    $medicos->save();

                    Session::flash('message', 'ESTUDIANTE REGISTRADO EXITOSAMENTE');

                    return redirect('estudiantes');
                            
                }
                
            }

        }else{

            $estudiante = Estudiante::create($request->all());

                            
            $medicos = new DatosMedico;
            $medicos->id_estudiante = $estudiante->id;
            $medicos->grupo_sanguineo = $request->grupo_sanguineo;
            $medicos->peso = $request->peso;
            $medicos->altura = $request->altura;
            $medicos->capacidad_especial = $capacidad_especial;
            $medicos->porcentaje_discapacidad = $porcentaje_discapacidad;
            $medicos->medicinas_contraindicadas = $medicinas_contraindicadas;
            $medicos->alergico_a = $alergico_a;
            $medicos->patologia = $patologia;
            $medicos->save();

            Session::flash('message', 'ESTUDIANTE REGISTRADO EXITOSAMENTE');

            return redirect('estudiantes');
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
        $estudiante = Estudiante::find($id);
        $representante = $estudiante->representante;
        $padres = $estudiante->padres()->get();

        return view('estudiantes.show', compact('estudiante', 'representante', 'padres'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $estudiante = DB::table('datos_generales_estudiante')
                        ->join('datos_medicos', 'datos_medicos.id_estudiante', '=', 'datos_generales_estudiante.id')
                        //->join('padres_has_estudiantes', 'padres_has_estudiantes.id_estudiante', '=', 'datos_generales_estudiante.id')
                        //->join('datos_padres', 'datos_padres.id', '=', 'padres_has_estudiantes.id_padre')
                        //->join('datos_unidad_precedente', 'datos_unidad_precedente.id_estudiante', '=', 'datos_generales_estudiante.id')
                        ->where('datos_generales_estudiante.id', '=', $id)
                        ->first();

        return view('estudiantes.edit', compact('estudiante'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EstudianteRequest $request, $id)
    {
        $cedula = $request->nacionalidad_es.$request->cedula;

        if(!empty($request->foto))
        {
            $estudiante = Estudiante::find($id);

            Storage::disk('estudiante')->delete($estudiante->foto);

            $estudiante->fill($request->all())->save();

            $estudiante->foto = $request->foto;
            $estudiante->cedula = $cedula;
            $estudiante->save();

            $estudiante->medicos->fill($request->all())->save();

            Session::flash('message', 'ESTUDIANTE ACTUALIZADO EXITOSAMENTE');

            return redirect()->back();
        
        }else{

            $estudiante = Estudiante::find($id);

            $estudiante->fill($request->all())->save();

            $estudiante->cedula = $cedula;
            $estudiante->save();

            $estudiante->medicos->fill($request->all())->save();

            Session::flash('message', 'ESTUDIANTE ACTUALIZADO EXITOSAMENTE');

            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $estudiante = Estudiante::find($request->id);

        if($estudiante->cursos()->exists()) {

            Session::flash('message-error', 'DISCULPE NO SE PUEDE ELIMINAR EL ESTUDIANTE PORQUE SE ENCUENTRA INSCRITO EN ALGÚN PERIODO');

            return redirect()->back();

        } else {

            $estudiante->delete();

            Session::flash('message', 'ESTUDIANTE '.$estudiante->nombres.' SE HA ELIMINADO CORRECTAMENTE.');

            return redirect()->back();
        }
    }

    public function search(Request $request)
    {
        $representante = $request->representante;
        $padre = $request->padre;
        $madre = $request->madre;
    
        return view('estudiantes.forms.fields-search', compact('cedula', 'representante', 'padre', 'madre'));
    }
}
