<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seccion;
use App\Http\Requests;
use App\Http\Requests\SeccionesRequest;
use Session;
use App\Cursos;
use DB;
use Auth;

class SeccionController extends Controller
{
    public function __construct(){
        if(Auth::user()->roles_id == 4){
            $this->middleware('recursohumano');
        }
        elseif(Auth::user()->roles_id == 5){
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
        $seccion = Seccion::all();
        return view('secciones.index', ['seccion'=>$seccion]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function create()
    {

        $cursos = Cursos::lists('curso', 'id');
        //dd($cursos);
        return view('secciones.create', compact('cursos'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $buscar=Seccion::where('literal',$request->literal)->where('id_curso',$request->id_curso)->first();
        
        if(count($buscar)>0){
            
            Session::flash('message-error', 'NO SE PUEDE REGISTRAR LA SECCION DEBIDO A QUE YA EXISTE PARA DICHO CURSO');
            
        }else{
            
            $seccion = new Seccion();
            $seccion->literal = strtoupper($request['literal']);
            $seccion->capacidad = $request['capacidad'];
            $seccion->id_curso= $request['id_curso'];
            $seccion->save();
            
            Session::flash('message', 'SECCIÓN CREADA CORRECTAMENTE');
        }

        $seccion = Seccion::all();
        return view("secciones.index", ['seccion'=>$seccion]);
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
        $seccion = Seccion::find($id);
        $cursos=Cursos::lists('curso','id');
        return view('secciones.edit', ['seccion'=>$seccion])->with('cursos',$cursos);
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
        $buscar=Seccion::where('literal',$request->literal)->where('id_curso',$request->id_curso)->where('id','<>',$id)->first();
        if(count($buscar)>0){
            Session::flash('message-error', 'NO SE PUEDE REGISTRAR LA SECCION DEBIDO A QUE YA EXISTE PARA DICHO CURSO');
            
        }else{
            $seccion = Seccion::find($id);
            $seccion->literal = strtoupper($request['literal']);
            $seccion->capacidad = $request['capacidad'];
            $seccion->id_curso=$request['id_curso'];
            $seccion->save();

            Session::flash('message', 'SECCION EDITADA CORRECTAMENTE');
        }
        $seccion = Seccion::all();
        return view("secciones.index", ['seccion'=>$seccion]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $buscar=DB::table('asignacion_bloques')->where('id_seccion',$id)->first();
        if(count($buscar)>0){
            Session::flash('message-error', 'NO SE PUEDE ELIMINAR LA SECCION DEBIDO A QUE YA EXISTE ASIGNADA EN UN HORARIO');
            
        }else{
            $secciones=Seccion::find($id);
            $secciones->delete();
             Session::flash('message', 'SECCION ELIMINADA CORRECTAMENTE');
        }

        $seccion = Seccion::all();
        return view("secciones.index", ['seccion'=>$seccion]);
    }
}
