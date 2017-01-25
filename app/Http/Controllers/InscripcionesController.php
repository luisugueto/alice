<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Estudiante;
use App\Quimestrales;
use App\Cursos;
use App\Seccion;
use Session;
use DB;
use App\Rubros;
use App\Periodos;
use App\Facturacion;
use App\FacturasRubros;
use App\RubrosRealizados;
class InscripcionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantes=Estudiante::all();

        return view('inscripciones.index', compact('estudiantes'));
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
        $id_periodo=Session::get('periodo');
        $curso=Cursos::find($request->id_curso);
        $seccion=Seccion::find($request->id_seccion);
        //para saber si es regular se debe buscar el estudiante en inscripciones  en algun periodo lectivo
       
       
        $inscripciones=DB::insert("INSERT INTO inscripciones(id_estudiante,id_curso,id_seccion,id_periodo,repite,becado) VALUES(".$request->id_estudiante.",".$request->id_curso.",".$request->id_seccion.",".$id_periodo.",'".$repite."','".$becado."')");
        
        $cuantos=count($request->id_rubro);

                if($cuantos>0){
                    $string="0123456789";
                $su=strlen($string)-1;
                $numero= substr($string,rand(0,$su),1).substr($string,rand(0,$su),1).substr($string,rand(0,$su),1).substr($string,rand(0,$su),1).substr($string,rand(0,$su),1).substr($string,rand(0,$su),1);
                $facturar=DB::insert("INSERT INTO facturacion(id_estudiante,numero,fecha,total_pago) VALUES(".$request->id_estudiante.",".$numero.",'".date('Y-m-d')."',0)");
                $factura=Facturacion::all()->last();
                $id_factura=$factura->id;
                //dd($id_factura);

                       $suma=0;
                    for ($i=0; $i < $cuantos; $i++) { 

                        $rubros=Rubros::find($request->id_rubro[$i]);
                       
                           $suma=$suma+$rubros->monto;
                           $pagar=FacturasRubros::create(['id_factura' => $id_factura,'id_rubro' => $request->id_rubro[$i]]);
                     
                    }

                $factura2=Facturacion::find($id_factura);
                $factura2->total_pago=$suma;
                $factura2->save();

                }
        Session::flash('message', 'ESTUDIANTE INSCRITO EXITOSAMENTE EN EL CURSO '.$curso->curso.' EN LA SECCIÓN '.$seccion->literal);   
        return redirect('inscripciones');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   

        $id_periodo=Session::get('periodo');
        $periodo=Periodos::find($id_periodo);
        $estudiantes=DB::select("SELECT * FROM datos_generales_estudiante,inscripciones,cursos,secciones WHERE datos_generales_estudiante.id=inscripciones.id_estudiante AND inscripciones.id_periodo=".$id_periodo." AND cursos.id=inscripciones.id_curso AND secciones.id=inscripciones.id_seccion");

        return View('inscripciones.show',compact('estudiantes','periodo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id_periodo = Session::get('periodo');
        $buscar=Quimestrales::where('id_estudiante',$id)->first();
        $estudiantes=Estudiante::find($id);
        $encontrado=count($buscar);
        $fecha_actual=date('Y-m-d');
        $sql="select fecha_nacimiento, YEAR('".$fecha_actual."') - YEAR(fecha_nacimiento) as edad FROM datos_generales_personal WHERE id = ".$id."";
        //dd($sql);
        $edad=DB::select($sql);

            if ($encontrado==0) {
                # es nuevo
                $inscripto=DB::select('SELECT * FROM inscripciones WHERE id_estudiante='.$id.' AND id_periodo='.$id_periodo);
                $listo=count($inscripto);
                if ($listo>0) {
                    Session::flash('message-error', 'DISCULPE, ESTE ESTUDIANTE YA SE ENCUENTRA INSCRITO EN EL PPERIODO LECTIVO ACTUAL');   

                    return redirect('inscripciones');
                }else{
                
                $estado="Nuevo Ingreso";
                $cursos=Cursos::lists('curso','id');
            
                return View('inscripciones.create',compact('estudiantes','cursos','estado','edad'));
                }
            } else {
                $id_periodo_anterior = Session::get('periodo') - 1;
                # es regular
                $quimestres=DB::select('SELECT * FROM quimestrales,quimestres WHERE quimestrales.id_estudiante='.$id.' AND quimestrales.id_quimestre=quimestres.id AND quimestres.id_periodo='.$id_periodo.'');
                $estado="Regular";
                    
                $buscar2=DB::select('SELECT * FROM inscripciones WHERE id='.$id.' AND id_periodo='.$id_periodo.'');
            }

          $periodo=Periodos::find($id_periodo);            
            return View('inscripciones.create',compact('estudiantes','periodo'));

    }
    

    public function buscar($id)
    {
        return $seccion = Seccion::where('id_curso',$id)->get();  
    }

    public function buscarrubros($id){

        $id_periodo= Session::get('periodo');

        $rubros=Rubros::where('id_curso',$id)->where('id_periodo',$id_periodo)->get();


        return $rubros;
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   $id_periodo=Session::get('periodo');
        $cambio=DB::update('UPDATE inscripciones SET id_seccion='.$request->id_seccion.' WHERE id_estudiante='.$id.' AND id_periodo='.$id_periodo);
        /*dd($cambio);*/
        if($cambio==1){
            Session::flash('message', 'CAMBIO DE SECCIÓN EXITOSO');   

        }else{
            Session::flash('message-error', 'DISCULPE NO SE PUDO REALIZAR EL CAMBIO DE SECCIÓN');   

        }

        return redirect(route('inscripciones.show',[0]));
    }

    public function cambiarseccion($id){

        $id_periodo=Session::get('periodo');
        $periodo=Periodos::find($id_periodo);
        $estudiantes=Estudiante::find($id);

        $inscripciones=DB::select("SELECT * FROM datos_generales_estudiante,inscripciones,cursos,secciones WHERE datos_generales_estudiante.id=inscripciones.id_estudiante AND inscripciones.id_periodo=".$id_periodo." AND cursos.id=inscripciones.id_curso AND secciones.id=inscripciones.id_seccion GROUP BY inscripciones.id_estudiante");

        foreach ($inscripciones as $inscripciones) {
            $id_curso=$inscripciones->id_curso;
        }
        $secciones=Seccion::where('id_curso',$id_curso)->lists('literal','id');
        return View('inscripciones.edit',compact('estudiantes','periodo','inscripciones','secciones'));

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
