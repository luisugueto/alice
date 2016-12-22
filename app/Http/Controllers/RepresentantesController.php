<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Representante;
use App\Http\Requests\RepresentanteRequest;
use App\Http\Requests\CedulaRequest;
use App\Padres;
use Session;
use Auth;

class RepresentantesController extends Controller
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
    	//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CedulaRequest $request)
    {
        $cedula_re = $request->nacionalidad.$request->cedula_re;

        $representante = Representante::where('cedula_re', $cedula_re)->first();
        
        if(!empty($request->cedula_pa))
        {
            $cedula_pa = false;

        }else{

            $padre = Padres::where('cedula_pa', $request->cedula_pa)->first();

            if(count($padre) == 0)
            {
                $padre = false;
            }

        }

        if(!empty($request->cedula_ma))
        {
            $cedula_ma = false;
        
        }else{

            $madre = Padres::where('cedula_pa', $request->cedula_ma)->first();

            if(count($madre) == 0)
            {
                $madre = false;
            }
        }

        if(!empty($representante)) 
        {
            Session::flash('message', 'REPRESENTANTE CON NÚMERO DE CÉDULA '.$cedula_re.' ENCONTRADO PROCESA A RELLENAR LOS CAMPOS');

            return redirect()->action('EstudiantesController@search', compact('representante', 'padre', 'madre'));

        }else{

            return view('representantes.create', compact('cedula_re', 'padre', 'madre'));
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RepresentanteRequest $request)
    {
        
        $representante = Representante::create($request->all())->save();
        
        Session::flash('message', 'REPRESENTANTE REGISTRADO CORRECTAMENTE');

        return redirect()->action('EstudiantesController@search', compact('representante'));

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

    public function search()
    {
        return view('representantes.forms.fields-search');
    }
}
