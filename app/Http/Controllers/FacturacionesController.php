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
use Carbon\Carbon;
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
		public function index()
		{
				$facturacion = FacturasRubros::groupBy('id_factura')->get();
				//dd($facturacion);
				return view('facturaciones.index', compact('facturacion'));
		}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function create(CedulaEstudianteRequest $request)
		{
				$cedula = $request->nacionalidad.$request->cedula;

				$estudiante = Estudiante::where('cedula', $cedula)->first();
 
				if(!empty($estudiante))
				{
						$cursos = Cursos::lists('curso', 'id');
						
						return view('facturaciones.create', compact('estudiante', 'cursos'));
				
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
				
				$numero = date('dmhis');

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
										
											Session::flash('message-error', 'SE HA REGISTRADO UN NUEVO PAGO EXITOSAMENTE');
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

									Session::flash('message-error', 'SE HA REGISTRADO UN NUEVO PAGO EXITOSAMENTE');
									
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

								Session::flash('message-error', 'SE HA REGISTRADO UN NUEVO PAGO EXITOSAMENTE');

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
}
