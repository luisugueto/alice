<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Representante;
use App\Http\Requests\RepresentanteRequest;
use App\Http\Requests\CedulaRequest;
use Session;

class RepresentantesController extends Controller
{
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
    public function create()
    {
        return view('representantes.create');
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
        
        Session::flash('message', 'Representante Creado Correctamente');

        return redirect()->action('EstudiantesController@create', compact('representante'));

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

    public function search(CedulaRequest $request)
    {

    	$representante = Representante::where('cedula_re', $request->cedula_re)->first();

    	if(!empty($representante)) 
    	{
    		return redirect()->action('EstudiantesController@create', compact('representante'));

    	}else{

    		$cedula_re = $request->cedula_re;

    		return view('representantes.create', compact('cedula_re'));
    	}
    }
}
