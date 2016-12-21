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
use App\Http\Requests\EstudianteRequest;
use App\Http\Requests\CedulaEstudianteRequest;
use Auth;

class EstudiantesController extends Controller
{
    public function __construct(){
        if(Auth::user()->roles_id == 5){
            $this->middleware('dace');
        }
        elseif(Auth::user()->roles_id == 2){
            $this->middleware('director');
        }
        else{
            $this->middleware('administrador');
        }
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
    public function create(Request $request)
    {
    	$representante = Representante::where('id', $request->representante)->first();
        
    	if(!empty($representante)) 
    	{

    		return view('estudiantes.create', compact('representante'));

    	}else{

        	return view('estudiantes.create');

    	}
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstudianteRequest $request)
    {
        $variable = count($request->cedula_pa1)+count($request->cedula_pa0);
    
        $estudiante = Estudiante::create($request->all());
        //$estudiante->documentos()->create($request->all());
        //$estudiante->novedades()->create($request->all());
        //$estudiante->medicos()->create($request->all());
        
        for($j=0; $j<count($request->nombre); $j++)
        {
            $factura =  $estudiante->facturaciones()->saveMany([new Facturacion(['nombre' => $request->nombre[$j], 'monto' => $request->monto[$j], 'fecha_max' => $request->fecha_max[$j], 'enviar_banco' => 'No'])]);

            
            $factura[$j]->rubros()->attach($estudiante);
            
        }
        
        if($variable == '1') { $i=1; $fin=2; }else{ $i=0; $fin=2; }
        
        for($i; $i < $fin; $i++)
        {
           $estudiante->padres()->saveMany([new Padres(['nombres_pa' => $request["nombres_pa".$i], 'cedula_pa' => $request["cedula_pa".$i], 'foto_pa' => 'no disponible', 'lugar_trabajo' => $request["lugar_trabajo".$i], 'direccion_pa' => $request["direccion_pa".$i], 'telefono_pa' => $request["telefono_pa".$i], 'correo_pa' => $request["correo_pa".$i], 'nacionalidad_pa' => $request["nacionalidad_pa".$i], 'nivel_educacion' => $request["nivel_educacion".$i]])]);
        }

        return redirect('/estudiantes');
        
        
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

    public function search(CedulaEstudianteRequest $request)
    {

        $estudiante = Estudiante::where('cedula', $request->cedula)->first();

        if(!empty($estudiante)) 
        {

            return redirect()->back();

        }else{

            $cedula = $request->cedula;
            $id_representante = $request->id_representante;

            return view('estudiantes.create', compact('cedula', 'id_representante'));
        }
    }
}
