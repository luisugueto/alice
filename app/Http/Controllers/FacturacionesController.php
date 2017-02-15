<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CedulaEstudianteRequest;
use App\RubrosRealizados;
use App\Estudiante;
use App\Rubros;
use App\Modalidad;
use App\FormasPago;
use App\FacturasRubros;
use App\Facturacion;
use App\Cursos;
use App\Periodos;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Session;
use DB;
use Excel;

class FacturacionesController extends Controller
{
	
		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index(Request $request)
		{

			$cursos = Cursos::lists('curso', 'id');
			$periodos = Periodos::lists('nombre', 'id');
			$estudiantes = Estudiante::all();

			if(!empty($request->inic) AND !empty($request->fin))
			{
				$this->validate($request, [
					'literal' => 'required',
					'curso'   => 'required'
				]);

				$curso = Cursos::find($request->curso);

				$estudiantes2 = Estudiante::where('apellido_paterno', 'like', $request->literal . '%')->get();
				
				if (Estudiante::where('apellido_paterno', 'like', $request->literal . '%')->exists()) {

					foreach ($estudiantes2 as $estudiante) {

						if($estudiante->cursos()->where('id_curso', $curso->id)->exists()){

							$facturaciones = $estudiante->facturaciones()->whereBetween('fecha', [$request->inic, $request->fin])->get();

							if (count($facturaciones) > 0) {
								
								foreach ($facturaciones as $key => $facturas) {

									if(count($facturas->facturacion_rubros) > 0) {

										$facturacion = $facturas->facturacion_rubros;

									} 
								}

							} else {

								Session::flash('message-error', 'DISCULPE NO SE ENCONTRARON RESULTADOS COINCIDENTES.');

								return redirect('facturaciones');
							}
						
						} else {

							Session::flash('message-error', 'DISCULPE NO SE ENCONTRARON RESULTADOS COINCIDENTES.');

							return redirect('facturaciones');
						} 


					}


					return view('facturaciones.index', compact('facturacion', 'cursos', 'periodos', 'estudiantes'));


				} else {

					Session::flash('message-error', 'DISCULPE NO SE PUDO ORDENAR POR '.$request->literal.' YA QUE NO EXISTEN ESTUDIANTES CON ESE NOMBRE.');

					return redirect('facturaciones');

				}

			} else {

				if (!empty($request->periodo) AND !empty($request->id_estudiante)) {

					$this->validate($request, [
						'periodo'       => 'required',
						'id_estudiante' => 'required'
					]);

					$periodo = Periodos::find($request->periodo);
					$estudiante = Estudiante::find($request->id_estudiante);

					$facturaciones = $estudiante->facturaciones()->whereYear('fecha', '=', $periodo->nombre)->get();
					
					if(count($facturaciones) > 0) {

						foreach($facturaciones as $facturas) {

							$facturacion = $facturas->facturacion_rubros()->groupBy('id_factura')->get();
						}

					} else {
							
						$facturacion = array();
					}


					return view('facturaciones.index', compact('facturacion', 'cursos', 'periodos', 'estudiantes'));
				} 


			}

			return view('facturaciones.index', compact('cursos', 'periodos', 'estudiantes'));
		}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function create(CedulaEstudianteRequest $request)
		{
			$periodo = Session::get('periodo');

			$estudiante = Estudiante::where([['nacionalidad_ced', $request->nacionalidad], ['cedula', $request->cedula]])->first();
			if(!empty($estudiante))
			{
					
				if($estudiante->cursos()->where('id_periodo', $periodo)->exists()){

					$curso = $estudiante->cursos()->where('id_periodo', $periodo)->first();
					
					$cursos = Cursos::where('id', $curso->pivot->id_curso)->first();

					$rubros = $cursos->rubros;

					return view('facturaciones.create', compact('estudiante', 'rubros'));
					

				} else {

					Session::flash('message-error', 'ESTUDIANTE NO SE ENCUENTRA INSCRITO EN ESTE PERIODO');

					return redirect()->back();
				}

			}else{

				Session::flash('message-error', 'ESTUDIANTE NO SE ENCUENTRA REGISTRADO EN LA BASE DE DATOS');

				return redirect()->back();
			}

		}

		public function morosos()
		{
			$morosos = DB::table('morosos')
						  ->join('datos_generales_estudiante', 'datos_generales_estudiante.id', '=', 'morosos.id_estudiante')
						  ->join('datos_representantes', 'datos_representantes.id', '=', 'datos_generales_estudiante.id_representante')
						  ->join('facturacion', 'facturacion.id', '=', 'morosos.id_factura')
						  ->get();

			return view('facturaciones.forms.fields-date', compact('morosos'));
		}

		public function descargarMorosos()
		{
			$morosos = DB::table('morosos')
						  ->join('datos_generales_estudiante', 'datos_generales_estudiante.id', '=', 'morosos.id_estudiante')
						  ->join('datos_representantes', 'datos_representantes.id', '=', 'datos_generales_estudiante.id_representante')
						  ->join('facturacion', 'facturacion.id', '=', 'morosos.id_factura')
						  ->get();
			Excel::create("Listado Total de Morosos", function ($excel) use ($morosos) {
               
                $excel->setTitle("Listado Total de Morosos");
                $excel->sheet("Pestaña 1", function ($sheet) use ($morosos) {
                    $sheet->loadView('facturaciones.excel.descargarMorosos')->with('morosos', $morosos);
                });
            })->download('xls');
		}

		/**
		 * Store a newly created resource in storage.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @return \Illuminate\Http\Response
		 */
		public function store(Request $request)
		{
			$estudiante = Estudiante::find($request->id_estudiante);

			if(count($request->id_rubro) > 0)
			{

				$suma = 0;
				
				$string="0123456789";
                $su=strlen($string)-1;
                $numero= substr($string,rand(0,$su),1).substr($string,rand(0,$su),1).substr($string,rand(0,$su),1).substr($string,rand(0,$su),1).substr($string,rand(0,$su),1).substr($string,rand(0,$su),1);

				$factura = new Facturacion;
				$factura->id_estudiante = $request->id_estudiante;
				$factura->numero = $numero;
				$factura->fecha = Carbon::now();
				$factura->total_pago = 0;
				$factura->save();

				for ($i=0; $i < count($request->id_rubro); $i++) 
				{ 

	                $rubros = Rubros::find($request->id_rubro[$i]);
                    
                    $suma += $rubros->monto;

                	$rubros->facturacion_rubros()->saveMany([new FacturasRubros(['id_factura' => $factura->id], ['id_rubro' => $rubros->id[$i]])]);
                     
                }
                
                $factura = Facturacion::find($factura->id);
                $factura->total_pago = $suma;
                $factura->save();

                Session::flash('message', 'FACTURACIÓN SE REALIZO EXITOSAMENTE AL ESTUDIANTE '.$estudiante->cedula.' '.$estudiante->nombres.'');  

                return redirect('facturaciones');

			}else{

				Session::flash('message-error', 'DEBE SELECCIONAR ALMENOS 1 RUBRO');

				return redirect()->back();
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
				$facturacion = FacturasRubros::find($id);
				$modalidad = Modalidad::lists('modalidad', 'id');
				$formas_pago = FormasPago::get();

				return view('facturaciones.edit', compact('facturacion', 'modalidad', 'formas_pago'));
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
				$facturacion = FacturasRubros::find($id);
	
				$existe = $facturacion->realizados()->exists();

				$forma_pago = Modalidad::find($request->id_modalidad);
				
 
				if($request->nro_transferencia == "")
				{
 
					$nro_transferencia="0";
	
				}else{
 
							$nro_transferencia = $request->nro_transferencia;
				}
 
				if($request->nro_cheque=="")
				{ 

						$nro_cheque="0";
 
				}else{
	
						$nro_cheque = $request->nro_cheque;
				}
 
 
				if($existe)
				{
						$rubros_realizados = $facturacion->realizados->last();
						
						if($request->monto_pagar > $rubros_realizados->monto_adeudado)
						{
								Session::flash('message-error', 'EL MONTO A PAGAR NO PUEDE SER MAYOR QUE EL DE LA DEUDA');
 
								return redirect()->back();
 
							}else{
 
									if($forma_pago->modalidad == 'Exacto')
									{
 
											$monto_deuda = $rubros_realizados->monto_adeudado-$rubros_realizados->monto_adeudado;
	
											$rubros_realizado = new RubrosRealizados;
											$rubros_realizado->id_factura_rubro = $id;
											$rubros_realizado->monto_pagado = $rubros_realizados->monto_adeudado;
											$rubros_realizado->monto_adeudado = $monto_deuda;
											$rubros_realizado->fecha = new \DateTime();
											$rubros_realizado->id_modalidad = $request->id_modalidad;
											$rubros_realizado->no_transferencia = $nro_transferencia;
											$rubros_realizado->no_cheque = $nro_cheque;
											$rubros_realizado->save();
	
											for($i=0; $i < count($request->id_forma); $i++)
											{
													$rubros_realizado->formas()->attach($request->id_forma[$i]);
											}   
										
											Session::flash('message', 'SE HA REGISTRADO UN NUEVO PAGO EXITOSAMENTE');
									}else{
	
											$monto_deuda = $rubros_realizados->monto_adeudado-$request->monto_pagar;
 
											$rubros_realizado = new RubrosRealizados;
											$rubros_realizado->id_factura_rubro = $id; 
											$rubros_realizado->monto_pagado = $request->monto_pagar;
											$rubros_realizado->monto_adeudado = $monto_deuda;
											$rubros_realizado->fecha = new \DateTime();
											$rubros_realizado->id_modalidad = $request->id_modalidad;
											$rubros_realizado->no_transferencia = $nro_transferencia;
											$rubros_realizado->no_cheque = $nro_cheque;
											$rubros_realizado->save();
	
											for($i=0; $i < count($request->id_forma); $i++)
											{
													$rubros_realizado->formas()->attach($request->id_forma[$i]);
											}   
									}

									Session::flash('message', 'SE HA REGISTRADO UN NUEVO PAGO EXITOSAMENTE');
									
									return redirect('facturaciones');
						}
	
					}else{
	
							if($request->monto_pagar > $facturacion->factura->total_pago)
							{
									Session::flash('message-error', 'EL MONTO A PAGAR NO PUEDE SER MAYOR QUE EL DE LA DEUDA');
	
									return redirect()->back();
	
							}else{
									
									if($forma_pago->modalidad == 'Exacto')
									{
											
										$monto_deuda = $facturacion->factura->total_pago-$facturacion->factura->total_pago;
	
										$rubros_realizados = new RubrosRealizados;
										$rubros_realizados->id_factura_rubro = $id;
										$rubros_realizados->monto_pagado = $facturacion->factura->total_pago;
										$rubros_realizados->monto_adeudado = $monto_deuda;
										$rubros_realizados->fecha = new \DateTime();
										$rubros_realizados->id_modalidad = $request->id_modalidad;
										$rubros_realizados->no_transferencia = $nro_transferencia;
										$rubros_realizados->no_cheque = $nro_cheque;
										$rubros_realizados->save();
	
										 for($i=0; $i < count($request->id_forma); $i++)
										 {
													$rubros_realizados->formas()->attach($request->id_forma[$i]);
										 }
 
									}else{
	
											$monto_deuda = $facturacion->factura->total_pago-$request->monto_pagar;
 
											$rubros_realizados = new RubrosRealizados;
											$rubros_realizados->id_factura_rubro = $id;
											$rubros_realizados->monto_pagado = $request->monto_pagar;
											$rubros_realizados->monto_adeudado = $monto_deuda;
											$rubros_realizados->fecha = new \DateTime();
											$rubros_realizados->id_modalidad = $request->id_modalidad;
											$rubros_realizados->no_transferencia = $nro_transferencia;
											$rubros_realizados->no_cheque = $nro_cheque;
											$rubros_realizados->save();
	
										for($i=0; $i < count($request->id_forma); $i++)
										{
													$rubros_realizados->formas()->attach($request->id_forma[$i]);
										}
								}

								Session::flash('message', 'SE HA REGISTRADO UN NUEVO PAGO EXITOSAMENTE');

								return redirect('facturaciones');
							}
				}

				return redirect('facturaciones');
		
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
			return view('facturaciones.forms.fields-search');
		}

	public function pdf($nro_factura)
	{
		$periodo = Session::get('periodo');

		$facturacion = Facturacion::find($nro_factura);
		$estudiante = $facturacion->estudiante;
		$rubros = $facturacion->facturacion_rubros;
		$curso = $estudiante->cursos()->where('id_periodo', $periodo)->first();
	

		$dompdf = \PDF::loadView('pdf.facturacion.index', ['facturacion' => $facturacion, 'estudiante' => $estudiante, 'rubros' => $rubros, 'curso' => $curso])->setPaper('a4', 'landscape');

        return $dompdf->stream();
	}
}
