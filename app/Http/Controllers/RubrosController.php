<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Rubros;
use App\Cursos;
use App\Http\Requests\RubrosRequest;
use Session;

class RubrosController extends Controller
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
    public function index()
    {
        $rubros = Rubros::all();
        return view('rubros.index', compact('rubros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos = Cursos::lists('curso', 'id');

        return view('rubros.create', compact('cursos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RubrosRequest $request)
    {
        foreach ($request->id_curso as $key => $curso) 
        {
            $existe = Rubros::where([['nombre', $request->nombre], ['id_periodo', $request->id_periodo], ['id_curso', $curso]])->exists();
       

            if($existe){

                Session::flash('message-error', 'RUBRO "'.$request->nombre.'" YA EXISTE EN LA BASE DE DATOS');

                return redirect()->back();

            }else{

                $rubros = new Rubros();
                $rubros->nombre     = $request->nombre;
                $rubros->monto      = $request->monto;
                $rubros->fecha      = $request->fecha;
                $rubros->id_curso   = $curso;
                $rubros->id_periodo = $request->id_periodo;
                $rubros->save();
            }
        }

        Session::flash('message', 'RUBRO '.$request->nombre.' REGISTRADO CORRECTAMENTE');
        
        return redirect('rubros');
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
        $rubros = Rubros::find($id);
        $cursos = Cursos::lists('curso', 'id');

        return view('rubros.edit', compact('rubros', 'cursos'));
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
         $rubros = Rubros::find($id);

         $rubros->fill($request->all())->save();

         Session::flash('message', 'RUBRO '.$request->name.' EDITADO CORRECTAMENTE');

         return redirect('rubros');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $rubro = Rubros::find($request->id);

        if($rubro->facturacion_rubros()->exists()){

            Session::flash('message-error', 'RUBRO NO SE PUEDE ELIMINAR PORQUE POSSE FACTURACIÓN EN ALGÚN PERIODO.');

            return redirect()->back();

        } else {

            $rubro->delete();

            Session::flash('message', 'SE HA ELIMINADO EL RUBRO '.$rubro->nombre.' CORRECTAMENTE.');

            return redirect()->back();
        }
    }
}
