<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Asignaturas;
use App\Categorias_parcial;
use App\Equivalencias;
use App\Comportamiento;
use App\Quimestres;
use App\Periodos;
use Session;
use DB;
use DateTime;
use Auth;
use Redirect;

class QuimestresController extends Controller
{
    public function __construct(){
       /* if(Auth::user()->roles_id == 5){
            $this->middleware('dace');
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
        $quimestres=Quimestres::all();

        return View('quimestres.index',compact('quimestres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $periodos=Periodos::lists('nombre','id');
        return View('quimestres.create',compact('periodos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $contar=0;
        $comienzo= new DateTime($request->inicio);
        $final= new DateTime($request->fin);

        $diferencia=$comienzo->diff($final);
        $meses=($diferencia->y * 12) + $diferencia->m;

        if ($meses!=5) {
                 Session::flash('message-error', 'NO SE PUEDE CREAR EL QUIMESTRE, DEBIDO A QUE ENTRE LAS FECHAS EXISTEN MÁS DE  5 MESES');
        
        }else{
          
        $inicio = explode("-", $request['inicio']);
        $fin = explode("-", $request['fin']);
        $anio1=date("Y", strtotime($request['inicio']));
        $anio2=date("Y", strtotime($request['fin']));
        $periodo=Periodos::find($request->id_periodo);
        //dd($anio);

        $encontrado=DB::select('SELECT * FROM quimestres WHERE 
            MONTH(inicio) = '.$inicio[1].' AND YEAR(fin) = '.$inicio[0].'
             UNION SELECT * FROM quimestres WHERE MONTH(inicio) = '.$fin[1].' 
             AND YEAR(fin) = '.$fin[0].'');
            if(!empty($encontrado)){
                $contar++;
            }

        

                if($contar>0){
                         Session::flash('message-error', 'NO SE PUEDE CREAR EL QUIMESTRE, DEBIDO A QUE YA EXISTE UNO CREADO PARA ESAS FECHAS');
                
                }else{
                    if($anio1==$periodo->nombre and $anio2==$periodo->nombre){
                        $quimestres1=Quimestres::where('id_periodo',$request->id_periodo)->get();
                        $cuantos=count($quimestres1);
                        if($cuantos==0){
                        $quimestres=Quimestres::create(['inicio' => $request->inicio,'fin' => $request->fin,'numero' => 1,'id_periodo' => $request->id_periodo]);
                        Session::flash('message', 'LA CREACIÓN DEL QUIMESTRE HA SIDO EXITOSA');
                        }else{
                            if($cuantos==1){
                                    $quimestres=Quimestres::create(['inicio' => $request->inicio,'fin' => $request->fin,'numero' => 2,'id_periodo' => $request->id_periodo]);
                                    Session::flash('message', 'LA CREACIÓN DEL QUIMESTRE HA SIDO EXITOSA');      

                            }
                            else{
                                    Session::flash('message-error', 'DISCULPE, YA HAN SIDO REGISTRADOS LOS 2 QUIMESTRES PARA DICHO PERIODO');
                            }

                        }


                    }else{
                                    Session::flash('message-error', 'DISCULPE, LAS FECHAS NO COINCIDEN CON EL PERIODO SELECCIONADO');
                    }
                         
                //--
                }

            }
            return redirect()->back();



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $asignaturas=Asignaturas::where('id_curso',$id)->get();
        $categorias=Categorias_parcial::all();
        $equivalencias=Equivalencias::all();
        $promedio_comp=Comportamiento::lists('literal','id');
        $quimestres=Quimestres::find($id);
        return View('quimestres.quimestre',compact('quimestres','asignaturas','categorias','equivalencias','promedio_comp'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quimestres=Quimestres::find($id);
        $quimestres1=Quimestres::where('id_periodo',$quimestres->id_periodo)->get();
        $periodos=Periodos::where('id', $quimestres->id_periodo)->lists('nombre', 'id');

        return View('quimestres.edit',compact('periodos','quimestres','quimestres1'));


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
        $quimestre = Quimestres::find($id);
        $numero=$quimestre->numero;
        $contar=0;
        $comienzo= new DateTime($request->inicio);
        $final= new DateTime($request->fin);

        $diferencia=$comienzo->diff($final);
        $meses=($diferencia->y * 12) + $diferencia->m;

        
        if ($meses!=5) {
                 Session::flash('message-error', 'NO SE PUEDE ACTUALIZAR EL QUIMESTRE, DEBIDO A QUE ENTRE LAS FECHAS EXISTEN MÁS DE  5 MESES');
        
        }else{
          
        $inicio = explode("-", $request['inicio']);
        $fin = explode("-", $request['fin']);

        $encontrado=DB::select('SELECT * FROM quimestres WHERE id<>'.$id.' AND 
            MONTH(inicio) = '.$inicio[1].' AND YEAR(fin) = '.$inicio[0].'
             UNION SELECT * FROM quimestres WHERE MONTH(inicio) = '.$fin[1].' 
             AND YEAR(fin) = '.$fin[0].'');
            if(!empty($encontrado)){
                $contar++;
            }

        

                if($contar>0){
                         Session::flash('message-error', 'NO SE PUEDE ACTUALIZAR EL QUIMESTRE, DEBIDO A QUE YA EXISTE UNO CREADO PARA ESAS FECHAS');
                
                }else{

                        $quimestres1=Quimestres::where('id_periodo',$request->id_periodo)->get();
                        $cuantos=count($quimestres1);
                            if($cuantos==1){
                                    $quimestre->update($request->all());
                                    Session::flash('message', 'LA ACTUALIZACIÓN DEL QUIMESTRE HA SIDO EXITOSA');      

                            }
                            else{
                                //----- actualizando el quimestre que esta llegando-----
                                $quimestre->update($request->all());

                                $quimestre2=Quimestres::where('id','!=',$id)->where('id_periodo',$request->id_periodo)->first();
                                if($numero!=$request->numero){
                                       if($numero==1){ 
                                    $quimestre2->numero=2;
                                    $quimestre2->save();
                                        }else{
                                    $quimestre2->numero=1;
                                    $quimestre2->save();
                                            
                                        }

                                }


                            }

                        



                         
                
                }

            }
          return redirect(route('quimestres.index'));

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
