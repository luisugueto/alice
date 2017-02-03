<?php 
use App\Periodos;
use App\Parciales;
use App\Personal;
use App\Quimestres;
use App\Quimestrales;
use App\Calificacion_parcial_subtotal;
use App\calificacion_quimestre;
use App\Seccion;
use App\Asignaturas;
	function verificarPeriodo()
	{
		$periodo = Periodos::where('id', Session::get('periodo'))->first();

		return $periodo->status;
	}

	function asignados($bloque, $asignados)
	{
		foreach ($asignados as $asignado)
		{
			if($bloque == $asignado)
			{
				return true;
			}
			
		}
	}

	function asignados_id($bloque, $asignados)
	{
		foreach ($asignados as $as) 
		{
			if($bloque == $as)
			{
				return $bloque;
			}
			
		}
	}

	function aulas($bloque, $aulas, $seccion)
    {
        foreach ($aulas as $aula)
        {
            $sql = \DB::table('asignacion_bloques')->where([['id_bloque', $bloque], ['id_aula', $aula], ['id_seccion', $seccion], ['id_periodo', Session::get('periodo')] ])->first();

            if(!empty($sql))
            {
                $aula_asignada = \DB::table('aulas')->where('id', $sql->id_aula)->first();

                return $aula_asignada->nombre;
            }
        }
    }

	function retardoAsistencia($id_personal)
	{
		$date = date("m");
		$per = DB::select('SELECT *, sum(retardo) as suma FROM retardo_asistencia WHERE id_personal = '.$id_personal.' AND MONTH(fecha) = '.$date.'');

		foreach ($per as $key) {
			$suma = $key->suma;
		}

		return $suma;
	}


	function totalPrestamos($id_personal)
	{
		$per = DB::table('remuneracion')->where('id_personal', $id_personal)
               ->orderBy('id', 'desc')
               ->first();

        $mes = date('m');
        $pagosrealizados = DB::select('SELECT *, sum(monto_pagado) as monto FROM pagos_realizados WHERE id_personal = '.$id_personal.' AND MONTH(fecha) = '.$mes.'');

        foreach ($pagosrealizados as $key) {
            $monto_pagos = $key->monto;
        }

        $prestamos = DB::select('SELECT *, sum(monto) as monto FROM prestamos WHERE id_personal = '.$id_personal.' AND MONTH(fecha) = '.$mes.'');

        foreach ($prestamos as $key) {
            $monto_prestamos = $key->monto;
        }

        $pagadoTotal = $monto_prestamos-$monto_pagos;

        return $pagadoTotal;
	}

	function remuneracion($id_personal)
	{
		$sql = \DB::table('remuneracion')->where('id_personal', $id_personal)->first();
		if(!empty($sql))
		{
			foreach ($sql as $key) {
				$suma = $sql->sueldo_mens + $sql->bono_responsabilidad;
		        $descuento = ($suma*$sql->descuento_iess)/100;
		        $capital = $suma-$descuento;
			}
		}
		return $capital;
	}

	function asignaturas_a($id_bloque, $id_asignatura, $id_seccion)
	{
		foreach ($id_asignatura as $asignatura) 
 		{

		$sql = \DB::table('asignacion_bloques')->where([['id_bloque', $id_bloque], ['id_asig', $asignatura], ['id_seccion', $id_seccion]])->first();
 
 			if(!empty($sql))
 			{
 				$sql = \DB::table('asignaturas')->where('id', $asignatura)->first();
 			
 				return $sql->codigo;
 			}
 		}
        
	}

	function asignaturas_id($id_bloque, $id_asignatura, $id_seccion)
	{
		foreach ($id_asignatura as $asignatura) 
 		{

		$sql = \DB::table('asignacion_bloques')->where([['id_bloque', $id_bloque], ['id_asig', $asignatura], ['id_seccion', $id_seccion]])->first();
 
 			if(!empty($sql))
 			{
 				$sql = \DB::table('asignaturas')->where('id', $asignatura)->first();
 			
 				return $sql->id;
 			}
 		}
      
	}

	function asignadas($bloque, $aulas)
	{
		foreach ($aulas as $as) 
		{
			if($bloque == $as)
			{
				return true;
			}
			
		}
	}


	function buscar($id_estudiante){
		//dd($id_estudiante);
		$id_periodo=Session::get('periodo');

		$buscar_q=\DB::select("SELECT * FROM quimestrales,quimestres WHERE quimestrales.id_estudiante=".$id_estudiante." AND quimestres.id_periodo=".$id_periodo."");
		$total_quimestres=count($buscar_q);

		$buscar_p=\DB::select("SELECT * FROM parciales,quimestres WHERE parciales.id_estudiante=".$id_estudiante." AND parciales.id_quimestre=quimestres.id AND quimestres.id_periodo=".$id_periodo."");
		$cuantos=count($buscar_p);

			if ($total_quimestres==0) {
				$a="1 er Quimestre";
			} else {
				if ($total_quimestres==1) {

					$a="2 do Quimestre";	
				} else {
					$a="Quimestres Completos";
				}
				
				
			}

			if ($cuantos==0) {
				$b="1 er  Parcial";
			} else {
				if ($cuantos==1) {
					$b="2 do  Parcial";
				} else {
					if($cuantos==2){
					$b="3 er Parcial";
					}else{
						$b="Parciales Completos";
					}
				}
				
			}

				$cargar=$b." del  ".$a;

		return $cargar;
	}

	function pdf($i, $quimestre){

		if ($i == 1 OR $i == 4)
		{
		    if($quimestre == 1){

                $parcial = '1ER PARCIAL DEL 1ER QUIMESTRE';

            } else {

		        $parcial = '1ER PARCIAL DEL 2DO QUIMESTRE';
		    }

        } elseif ($i == 2 OR $i == 5) {

            if($quimestre == 1){

                $parcial = '2DO PARCIAL DEL 1ER QUIMESTRE';

            } else {

                $parcial = '2DO PARCIAL DEL 2DO QUIMESTRE';
            }

        } elseif ($i== 3 OR $i == 6) {

            if($quimestre == 1){

                $parcial = '3ER PARCIAL DEL 1ER QUIMESTRE';

            } else {

                $parcial = '3ER PARCIAL DEL 2DO QUIMESTRE';
            }
        }

        return $parcial;
	}

	function cargas_completas($id_estudiante,$num)
	{
		$p1=0;$p2=0;$p3=0;$p4=0;$p5=0;$p6=0;
		$id_periodo=Session::get('periodo');
		$quimestre=Quimestres::where('id_periodo',$id_periodo)->where('numero',$num)->get();
		foreach ($quimestre as $q) {
			$parciales=Parciales::where('id_quimestre',$q->id)->where('id_estudiante',$id_estudiante)->get();
			$cuantos=count($parciales);

			if ($cuantos>0) {
				foreach ($parciales as $p) {
					//buscar la carga academica del estudiante
		            $cuantas=buscando_asignaturas_cursadas($id_estudiante);
					$cargadas=buscando_asignaturas_cargadas2($id_estudiante,$p->id,$q->id);

					switch ($cuantos) {
						case 1:
							if ($cuantas==$cargadas) 
							{
							  	$p1=1;
							  }
							break;
						case 2:
							if ($cuantas==$cargadas) 
							{
							  	$p2=1;
							 }
							break;
						case 3;
							if ($cuantas==$cargadas) 
							{
							  	$p3=1;
							}
							break;
						case 4:
							if ($cuantas==$cargadas) 
							{
							  	$p4=1;
							}
							break;
						case 5:
							if ($cuantas==$cargadas) 
							{
							  	$p5=1;
							}
							break;
						case 6:
							if ($cuantas==$cargadas) 
							{
							  	$p6=1;
							}
							break;
						
					}

				}
			}
			
		}

		switch ($num) {
			case 1:
				return $p1;
				break;
			case 2:
				return $p2;
				break;
			case 3:
				return $p3;
				break;
			case 4:
				return $p4;
				break;
			case 5:
				return $p5;
				break;
			case 6:
				return $p6;
				break;


			
		}


	}
	function cargas_completas_parcial($id_estudiante,$num)
	{
		$p1=0;$p2=0;$p3=0;$p4=0;$p5=0;$p6=0;
		$id_periodo=Session::get('periodo');
		$quimestre=Quimestres::where('id_periodo',$id_periodo)->where('numero',$num)->get();
		foreach ($quimestre as $q) {
			$parciales=Parciales::where('id_quimestre',$q->id)->where('id_estudiante',$id_estudiante)->get();
			$cuantos=count($parciales);

			if ($cuantos>0) {
				foreach ($parciales as $p) {
					//buscar la carga academica del estudiante
		            $cuantas=buscando_asignaturas_cursadas($id_estudiante);
					$cargadas=buscando_asignaturas_cargadas2($id_estudiante,$p->id,$q->id);

					switch ($cuantos) {
						case 1:
							if ($cuantas==$cargadas) 
							{
							  	$p1=$p->id;
							  }
							break;
						case 2:
							if ($cuantas==$cargadas) 
							{
							  	$p2=$p->id;
							 }
							break;
						case 3;
							if ($cuantas==$cargadas) 
							{
							  	$p3=$p->id;
							}
							break;
						case 4:
							if ($cuantas==$cargadas) 
							{
							  	$p4=$p->id;
							}
							break;
						case 5:
							if ($cuantas==$cargadas) 
							{
							  	$p5=$p->id;
							}
							break;
						case 6:
							if ($cuantas==$cargadas) 
							{
							  	$p6=$p->id;
							}
							break;
					}

				}
			}
			
		}

		switch ($num) {
			case 1:
				return $p1;
				break;
			case 2:
				return $p2;
				break;
			case 3:
				return $p3;
				break;
			case 4:
				return $p4;
				break;
			case 5:
				return $p5;
				break;
			case 6:
				return $p6;
				break;

			
		}


	}
function cargas_completas_quimestre($id_estudiante,$num)
	{
		$q1=0;$q2=0;
		$id_periodo=Session::get('periodo');
		$quimestre=Quimestres::where('id_periodo',$id_periodo)->where('numero',$num)->get();
		foreach ($quimestre as $q) {
			$quimestres=Quimestrales::where('id_quimestre',$q->id)->where('id_estudiante',$id_estudiante)->get();
			$cuantos=count($quimestres);

			if ($cuantos>0) {
				foreach ($quimestres as $qt) {
					//buscar la carga academica del estudiante
		            $cuantas=buscando_asignaturas_cursadas($id_estudiante);
					$cargadas=buscando_asignaturas_cargadas($id_estudiante,$qt->id,$q->id);

					switch ($cuantos) {
						case 1:
							if ($cuantas==$cargadas) 
							{
							  	$q1=$qt->id;
							  }
							break;
						case 2:
							if ($cuantas==$cargadas) 
							{
							  	$q2=$qt->id;
							 }
							break;
					}

				}
			}
			
		}

		switch ($num) {
			case 1:
				return $q1;
				break;
			case 2:
				return $q2;
				break;
			
			
		}


	}

	function buscar_dr($id_estudiante,$i){
		//para el caso de los docentes que son coordinadores de curso
		//se debe buscar el id de la seccion donde se encuentra el estudiante
		//y comparar con la seccion del coordinador
		 $cc=0;
		 
        $id_periodo=Session::get('periodo');
            $quimestre=Quimestres::where('id_periodo',$id_periodo)->get();
            /*dd($quimestre);*/
            foreach ($quimestre as $q) {
                $parciales=Parciales::where('id_quimestre',$q->id)->where('id_estudiante',$id_estudiante)->get();
                $cuantos=count($parciales);
                
                //echo $cuantos;
                if($cuantos>0){
                	foreach ($parciales as $p) {
                		
		                	
		                	//buscar la carga academica del estudiante
		                	 $cuantas=buscando_asignaturas_cursadas($id_estudiante);
		                	 //dd($cuantas);
		                	 //echo $cuantos;
		                	//en caso de ser docente
		                	//echo $i;
		                	if(Auth::user()->roles_id == 3 and $i==1){

		                			//buscando la carga academica cargada del estudiante
		                			$mias=bucar_mis_asignaturas_cargadas($id_estudiante,$p->id,$q->id);
		                			
		                			//buscando la cantidad de asignaturas cargadas
		                			$cargadas=buscando_asignaturas_cargadas2($id_estudiante,$p->id,$q->id);
		                				//echo $cargadas."-".$cuantas;
		                			if (($cargadas==0 || $cargadas==$cuantas) && $mias!=0) {
		                					$cc+=1;
		                					

		                			}else{
		                				
		                				if($mias!=0){
		                				$cc+=1;
		                				//echo $cc."-";
		                				}
		                			}

		                	}else{
		                		$cargadas=buscando_asignaturas_cargadas2($id_estudiante,$p->id,$q->id);
		                		//dd($cargadas);
		                		if ($cargadas==$cuantas) {

		                			$cc+=$cuantos;
		                		}
					
		                	}
		                	
                	}
                	

            	}


            }


            //echo $cc;
            switch ($cc) {
            	case 0:
            		$cargar="1 er Parcial del 1 er Quimestre";
            		break;
            	case 1:

            		$cargar="2 do Parcial del 1 er Quimestre";
            		break;
            	case 2:
            		$cargar="3 er Parcial del 1 er Quimestre";
            		break;
            	case 3:
            		$cargar="1 er Parcial del 2 do Quimestre";
            		break;
            	case 4:
            		$cargar="2 do Parcial del 2 do Quimestre";
            		break;
            	case 5:
            		$cargar="3 er Parcial del 2 do Quimestre";
            		break;
            	case 6:
            		$cargar="Carga Completa";
            		break;
            	
            	
            }
		return $cargar;
	}


	function buscar_quimestre($id_estudiante){

		#opcion==2 se han registrados los quimestres completos
		#opcion==1 solo se ha registrado uno
		#opcion==0 no se ha registrado ninguno
		#la búsqueda de quimestre debe ser de los registrados por el docente
		#para saber si el docente subio notas en el quimestre debe de estar sus asignaturas registradas
		//buscando las asignaturas del docente
		$correo=Auth::user()->email;

		$docente=Personal::where('correo',$correo)->first();

		$id_seccion=buscar_id_seccion($id_estudiante);

		$asignaturas=DB::select("SELECT * FROM asignacion WHERE id_prof=".$docente->id." AND id_seccion=".$id_seccion." LIMIT 0,1");

		foreach ($asignaturas as $asig) {
			
			$id_periodo=Session::get('periodo');
			$sql="SELECT * FROM quimestrales INNER JOIN quimestres ON quimestrales.id_quimestre=quimestres.id INNER JOIN periodos ON quimestres.id_periodo=periodos.id INNER JOIN calificacion_quimestre ON calificacion_quimestre.id_quimestrales=quimestrales.id WHERE quimestrales.id_estudiante=".$id_estudiante." AND quimestres.id_periodo=".$id_periodo." AND calificacion_quimestre.id_asignatura=".$asig->id_asignatura."";
			//dd($sql);
			$buscar_q=\DB::select($sql);
		}
		$opcion=count($buscar_q);
		//dd($opcion);


		return $opcion;

	}

	function buscar_parcial($id_estudiante){

		#parcial==0 no se ha registrado nin gun parcial
		#parcial==1 se ha registrado solo 1 parcial
		#parcial ==2 se ha registrado solo 2 parciales
		#parcial == 3 se han registrado todos los parciales
		$id_periodo=Session::get('periodo');


		$buscar_p=\DB::select("SELECT * FROM parciales,quimestres WHERE parciales.id_estudiante=".$id_estudiante." AND parciales.id_quimestre=quimestres.id AND quimestres.id_periodo=".$id_periodo."");
		$parcial=count($buscar_p);

		return $parcial;
	}

	function asignadas_id($bloque, $aulas)
	{
		foreach ($aulas as $key => $aula) 
		{
			$sql = \DB::table('asignacion_bloques')->where([['id_bloque', $bloque], ['id_aula', $aula]])->first();

			if(!empty($sql))
			{
				$sql = \DB::table('aulas')->where('id', $aula)->first();

				return $sql->id;
			}
		}

	}

	function buscar_curso($id,$id_periodo){

		
		$sql="SELECT cursos.* FROM inscripciones,secciones,cursos WHERE inscripciones.id_estudiante=".$id." AND cursos.id=secciones.id_curso AND inscripciones.id_seccion=secciones.id AND inscripciones.id_periodo=".$id_periodo;
		//dd($sql);
		$curso = DB::select($sql);
		foreach ($curso as $curso) {
			$id_curso=$curso->id;
		}
		if (count($curso)>0) {
			return $id_curso;
		}else{
			return  0;

		}
		
	}
	function buscar_curso2($id,$id_periodo){

		
		$sql="SELECT cursos.* FROM inscripciones,secciones,cursos WHERE inscripciones.id_estudiante=".$id." AND cursos.id=secciones.id_curso AND inscripciones.id_seccion=secciones.id AND inscripciones.id_periodo=".$id_periodo;
		//dd($sql);
		$curso = DB::select($sql);
		foreach ($curso as $curso) {
			$id_curso=$curso->id;
			$curso=$curso->curso;
		}
		if (count($curso)>0) {
			return $curso;
		}else{
			return  0;

		}
		
	}
function buscar_seccion($id){

		$id_periodo=Session::get('periodo');
		$sql="SELECT secciones.* FROM inscripciones,secciones,cursos WHERE inscripciones.id_estudiante=".$id." AND cursos.id=secciones.id_curso AND inscripciones.id_seccion=secciones.id AND inscripciones.id_periodo=".$id_periodo;
		//dd($sql);
		$secciones = DB::select($sql);
		foreach ($secciones as $secc) {
			$id_seccion=$secc->id;
			$seccion=$secc->literal;
		}
		if (count($secciones)>0) {
			return $seccion;
		}else{
			return  0;

		}
		
	}
function buscar_id_seccion($id){

		$id_periodo=Session::get('periodo');
		$sql="SELECT secciones.* FROM inscripciones,secciones,cursos WHERE inscripciones.id_estudiante=".$id." AND cursos.id=secciones.id_curso AND inscripciones.id_seccion=secciones.id AND inscripciones.id_periodo=".$id_periodo;
		//dd($sql);
		$secciones = DB::select($sql);
		foreach ($secciones as $secc) {
			$id_seccion=$secc->id;
			$seccion=$secc->literal;
		}
		if (count($secciones)>0) {
			return $id_seccion;
		}else{
			return  0;

		}
		
	}

	function buscar_mi_asignatura_parcial($id_estudiante,$id_seccion){

		$id_periodo=Session::get('periodo');
		$correo=Auth::user()->email;

		$docente=Personal::where('correo',$correo)->first();


		$asignaturas=DB::select("SELECT * FROM asignacion WHERE id_prof=".$docente->id." AND 
			id_seccion=".$id_seccion." LIMIT 0,1");


		$cuantas=count($asignaturas);


		if($cuantas==0){

			$encontrada=0;
		}else{
					$cc=0;
					foreach ($asignaturas as $asig) {
					
					$sql="SELECT calificacion_parcial.* FROM parciales,calificacion_parcial,quimestres WHERE 
					parciales.id_estudiante=".$id_estudiante." AND 
					calificacion_parcial.id_parcial=parciales.id AND 
					parciales.id_quimestre=quimestres.id AND 
					quimestres.id_periodo=".$id_periodo." AND 
					calificacion_parcial.id_asignatura=".$asig->id_asignatura." 
					GROUP BY calificacion_parcial.id_parcial";
					//dd($sql);
					$resultado=DB::select($sql);
					if(count($resultado)>0){
						$cc++;
					}

					}

				$contar=count($resultado);
				//dd($cc);
				if($contar==3){
					
					$cc2=0;
					foreach ($asignaturas as $asig) {
					
					$sql="SELECT calificacion_quimestre.* FROM quimestrales,calificacion_quimestre,quimestres WHERE 
					quimestrales.id_estudiante=".$id_estudiante." AND 
					calificacion_quimestre.id_quimestrales=quimestrales.id AND 
					quimestrales.id_quimestre=quimestres.id AND 
					quimestres.id_periodo=".$id_periodo." AND 
					calificacion_quimestre.id_asignatura=".$asig->id_asignatura." 
					GROUP BY calificacion_quimestre.id_quimestrales";
					//dd($sql);
					$result=DB::select($sql);
					if(count($result)>0){
						$cc2++;
					}

					}

					if ($cc2==0) {
						$encontrada=1;
					} else {
						$encontrada=0;
					}
					




				}else{
					if($contar==6){
						$cc2=0;
					foreach ($asignaturas as $asig) {
					
					$sql="SELECT calificacion_quimestre.* FROM quimestrales,calificacion_quimestre,quimestres WHERE 
					quimestrales.id_estudiante=".$id_estudiante." AND 
					calificacion_quimestre.id_quimestrales=quimestrales.id AND 
					quimestrales.id_quimestre=quimestres.id AND 
					quimestres.id_periodo=".$id_periodo." AND 
					calificacion_quimestre.id_asignatura=".$asig->id_asignatura." 
					GROUP BY quimestrales.id";
					//dd($sql);
					$result=DB::select($sql);
					if(count($result)==1){

						$cc2++;
					}else
					{
						if (count($result)==2) {
							$cc2+=2;
						}
						
					}

					}
					//echo $cc2;
						//dd($cc);
					if ($cc2==1) {
						$encontrada=2;
					} else {
						if($cc2==2){
							$encontrada=3;
						}else{
							$encontrada=0;
						}
					}
					

					}else{
					$encontrada=0;
					}
				}

			
			
		}

		

		return $encontrada;

	}

		
	function tipo_docente(){

		$correo=Auth::user()->email;

		$docente=Personal::where('correo',$correo)->first();
		if (count($docente)==0) {
			$tipo="Admin";
		} else {
			$tipo=$docente->cargo->nombre;
		}
		

	
		
		return $tipo;


	}

	function personal(){


		 	$personal=Personal::all();
            $correo=Auth::user()->email;
            foreach ($personal as $personal) {

                if($correo==$personal->correo){
                    $docente=Personal::find($personal->id);
                    $id_prof=$docente->id;
                    
                
                }
                
            }
            return $id_prof;

	}

	function buscando_asignaturas_cursadas($id_estudiante){


		$buscar=DB::select("SELECT asignaturas.* FROM inscripciones,cursos,asignaturas WHERE 
                    inscripciones.id_curso=cursos.id AND 
                    asignaturas.id_curso=cursos.id AND 
                    inscripciones.id_estudiante=".$id_estudiante);
                    $cuantas=count($buscar);

                    return $cuantas;
	}

	function buscando_asignaturas_cargadas($id_estudiante,$id_quimestrales,$id_quimestre){
		$id_periodo=Session::get('periodo');
		$buscar2=DB::select("SELECT * FROM quimestrales, calificacion_quimestre,quimestres WHERE 
                        id_estudiante=".$id_estudiante." AND 
                        quimestres.id=quimestrales.id_quimestre AND 
                        quimestres.id_periodo=".$id_periodo." AND 
                        calificacion_quimestre.id_quimestrales=quimestrales.id AND 
                        quimestrales.id=".$id_quimestrales." AND 
                        quimestrales.id_quimestre=".$id_quimestre." 
                        GROUP BY calificacion_quimestre.id_asignatura");

                    $cuantos=count($buscar2);

                    return $cuantos;
	}

	function buscando_asignaturas_cargadas2($id_estudiante,$id_parcial,$id_quimestre){
		$id_periodo=Session::get('periodo');

		$sql="SELECT * FROM parciales, calificacion_parcial,quimestres WHERE 
                        id_estudiante=".$id_estudiante." AND 
                        quimestres.id=parciales.id_quimestre AND 
                        quimestres.id_periodo=".$id_periodo." AND 
                        calificacion_parcial.id_parcial=parciales.id AND 
                        parciales.id=".$id_parcial." AND 
                        parciales.id_quimestre=".$id_quimestre." 
                        GROUP BY calificacion_parcial.id_asignatura ";

                        //dd($sql);

		$buscar2=DB::select($sql);

                    $cuantos=count($buscar2);

                    return $cuantos;
	}

	function suma_cargadas($id_estudiante,$id_parcial,$id_quimestre){
		$id_periodo=Session::get('periodo');

		$buscar2=DB::select("SELECT * FROM parciales, calificacion_parcial,quimestres WHERE 
                        id_estudiante=".$id_estudiante." AND 
                        quimestres.id=parciales.id_quimestre AND 
                        quimestres.id_periodo=".$id_periodo." AND 
                        calificacion_parcial.id_parcial=parcial.id AND 
                        parciales.id=".$id_parcial." AND 
                        parciales.id=".$id_quimestre." 
                        GROUP BY calificacion_parcial.id_asignatura ");
		$suma=0;
			foreach ($buscar2 as $b) {
				$suma+=$b->calificacion;
			}
                    

                    return $suma;
	}

	function bucar_mis_asignaturas_cargadas($id_estudiante,$id_parcial,$id_quimestre){

		$id_periodo=Session::get('periodo');
		$correo=Auth::user()->email;
		//buscando seccion del estudiante
		$id_seccion=buscar_id_seccion($id_estudiante);
		$docente=Personal::where('correo',$correo)->first();


		$asignaturas=DB::select("SELECT * FROM asignacion WHERE id_prof=".$docente->id." AND id_seccion=".$id_seccion." LIMIT 0,1");
		foreach ($asignaturas as $asig) {
			$id_asignatura=$asig->id_asignatura;
		}
			$sql="SELECT * FROM parciales, calificacion_parcial,quimestres WHERE 
                        id_estudiante=".$id_estudiante." AND 
                        quimestres.id=parciales.id_quimestre AND 
                        quimestres.id_periodo=".$id_periodo." AND 
                        calificacion_parcial.id_parcial=parciales.id AND 
                        parciales.id=".$id_parcial." AND 
                        parciales.id_quimestre=".$id_quimestre." AND 
                        calificacion_parcial.id_asignatura=".$id_asignatura." 
                        GROUP BY calificacion_parcial.id_asignatura ";
                       //echo $sql;
		$buscar2=DB::select($sql);

		$cuantos=count($buscar2);
		//dd($cuantos);
		return $cuantos;


	}

	function buscar_mis_asignaturas_cargadas_q($id_estudiante,$id_quimestral,$id_quimestre){

		$id_periodo=Session::get('periodo');
		$correo=Auth::user()->email;

		$docente=Personal::where('correo',$correo)->first();
		//buscando seccion del estudiante
		$id_seccion=buscar_id_seccion($id_estudiante);

		$asignaturas=DB::select("SELECT * FROM asignacion WHERE id_prof=".$docente->id." AND id_seccion=".$id_seccion." LIMIT 0,1");
		foreach ($asignaturas as $asig) {
			$id_asignatura=$asig->id_asignatura;
		}
			$sql="SELECT * FROM quimestrales, calificacion_quimestre,quimestres WHERE 
                        quimestrales.id_estudiante=".$id_estudiante." AND 
                        quimestres.id=quimestrales.id_quimestre AND 
                        quimestres.id_periodo=".$id_periodo." AND 
                        calificacion_quimestre.id_quimestrales=quimestrales.id AND 
                        quimestrales.id=".$id_quimestral." AND 
                        quimestrales.id_quimestre=".$id_quimestre." AND 
                        calificacion_quimestre.id_asignatura=".$id_asignatura." 
                        GROUP BY calificacion_quimestre.id_asignatura ";
                        //dd($sql);
		$buscar2=DB::select($sql);

		$cuantos=count($buscar2);

		return $cuantos;

	}

	function buscando_asignaturas_cargadas2_q($id_estudiante,$id_quimestral,$id_quimestre){

		$id_periodo=Session::get('periodo');

		$sql="SELECT * FROM quimestrales, calificacion_quimestre,quimestres WHERE 
                        quimestrales.id_estudiante=".$id_estudiante." AND 
                        quimestres.id=quimestrales.id_quimestre AND 
                        quimestres.id_periodo=".$id_periodo." AND 
                        calificacion_quimestre.id_quimestrales=quimestrales.id AND 
                        quimestrales.id=".$id_quimestral." AND 
                        quimestrales.id_quimestre=".$id_quimestre." 
                        GROUP BY calificacion_quimestre.id_asignatura ";

                        //dd($sql);

		$buscar2=DB::select($sql);

        $cuantos=count($buscar2);

        return $cuantos;

	}

	function buscar_calificacion_parcial($i,$id_estudiante,$id_periodo,$k){
		//k controlará si es 1 para calificaciones del coordinador
		//y si es 0 paara mostrar las calificaciones del profesor
		
		if($k==0){

		$correo=Auth::user()->email;
		//buscando seccion del estudiante
		$id_seccion=buscar_id_seccion($id_estudiante);
		$docente=Personal::where('correo',$correo)->first();

		
		$asignaturas=DB::select("SELECT * FROM asignacion WHERE id_prof=".$docente->id." AND id_seccion=".$id_seccion."");
		
		foreach ($asignaturas as $asig) {
			$id_asignatura=$asig->id_asignatura;
		
			$sql="SELECT * FROM parciales, calificacion_parcial,quimestres WHERE 
                        id_estudiante=".$id_estudiante." AND 
                        quimestres.id=parciales.id_quimestre AND 
                        quimestres.id_periodo=".$id_periodo." AND 
                        calificacion_parcial.id_parcial=parciales.id AND 
                        calificacion_parcial.id_asignatura=".$id_asignatura." 
                        GROUP BY calificacion_parcial.id_asignatura ";
                        //dd($sql);
        
		$buscar2=DB::select($sql);
		}

		$cuantos=count($buscar2);

		if($i>0 and $i<4){
			$num=1;

		}else{
			switch ($i) {
				case 4:
					$i=1;
					break;
				case 5:
					$i=2;
					break;
				case 6:
					$i=3;
					break;
				
			}
			$num=2;
		}

		//dd($id_periodo);
		$quimestre = Quimestres::where('id_periodo',$id_periodo)->where('numero', $num)->first();

		$parciales = Parciales::where('id_estudiante',$id_estudiante)->where('id_quimestre', $quimestre->id)->get();

		$cp=count($parciales);
		//dd($parciales->all());//echo $cp;
		if(count($parciales)>0 && $cuantos>0){
			$j=0;
			foreach ($parciales as $p) {
				
				$j++;
				if ($j==$i) {

					//$subtotal=Calificacion_parcial_subtotal::where('id_parcial',$p->id);
					$subtotal=DB::select("SELECT * FROM calificacion_parcial_subtotal WHERE id_parcial=".$p->id);
					//dd($asignaturas);
					$suma=0;
					$divide=0;

					foreach ($subtotal as $sub) {
						foreach ($asignaturas as $asig) {
							if($asig->id_asignatura==$sub->id_asignatura){
								//echo $suma;
								$suma+=$sub->avg_total;
								$divide++;
							}
						}
					}

					if($suma!=0){
					$promedio=$suma/$divide;
					}else{	
					$promedio=0;
					}
					break;
				} 
				
			}
			if ($j==$i) {
				if($promedio!=0){
				$nota=$promedio;
				$nota=number_format($nota,2,".",",");
				}else{
					$nota="SIN CARGAR";
				}

			} else {
				$nota="SIN CARGAR";
			}
			
		}else{
				$nota="SIN CARGAR";
			
		}

		return $nota;
	}else{//en caso de que k==1 es coordinador
		$correo=Auth::user()->email;
		//buscando seccion del estudiante
		$id_seccion=buscar_id_seccion($id_estudiante);
		$docente=Personal::where('correo',$correo)->first();
		$id_curso=buscar_curso($id_estudiante,$id_periodo);
		
		$asignaturas=Asignaturas::where('id_curso',$id_curso)->get();
		//dd($asignaturas);
		foreach ($asignaturas as $asig) {
			$id_asignatura=$asig->id;
		
			$sql="SELECT * FROM parciales, calificacion_parcial,quimestres WHERE 
                        id_estudiante=".$id_estudiante." AND 
                        quimestres.id=parciales.id_quimestre AND 
                        quimestres.id_periodo=".$id_periodo." AND 
                        calificacion_parcial.id_parcial=parciales.id AND 
                        calificacion_parcial.id_asignatura=".$id_asignatura." 
                        GROUP BY calificacion_parcial.id_asignatura ";
                        //dd($sql);
        
		$buscar2=DB::select($sql);
		}

		$cuantos=count($buscar2);

		if($i>0 and $i<4){
			$num=1;

		}else{
			switch ($i) {
				case 4:
					$i=1;
					break;
				case 5:
					$i=2;
					break;
				case 6:
					$i=3;
					break;
				
			}
			$num=2;
		}

		//dd($id_periodo);
		$quimestre = Quimestres::where('id_periodo',$id_periodo)->where('numero', $num)->first();

		$parciales = Parciales::where('id_estudiante',$id_estudiante)->where('id_quimestre', $quimestre->id)->get();

		$cp=count($parciales);
		//dd($parciales->all());//echo $cp;
		if(count($parciales)>0 && $cuantos>0){
			$j=0;
			foreach ($parciales as $p) {
				
				$j++;
				if ($j==$i) {

					//$subtotal=Calificacion_parcial_subtotal::where('id_parcial',$p->id);
					$subtotal=DB::select("SELECT * FROM calificacion_parcial_subtotal WHERE id_parcial=".$p->id);
					//dd($asignaturas);
					$suma=0;
					$divide=0;
					foreach ($subtotal as $sub) {
						foreach ($asignaturas as $asig) {
							if($asig->id_asignatura==$sub->id_asignatura){
								//echo $suma;
								$suma+=$sub->avg_total;
								$divide++;
							}
						}
					}

					if($suma!=0){
					$promedio=$suma/$divide;
					}else{	
					$promedio=0;
					}
					break;
				} 
				
			}
			if ($j==$i) {
				if($promedio!=0){
				$nota=$promedio;
				$nota=number_format($nota,2,".",",");
				}else{
					$nota="SIN CARGAR";
				}

			} else {
				$nota="SIN CARGAR";
			}
			
		}else{
				$nota="SIN CARGAR";
			
		}

		return $nota;
	}

	}

	function buscar_id_parcial($i,$id_estudiante){

		$id_periodo=Session::get('periodo');
		$correo=Auth::user()->email;

		$docente=Personal::where('correo',$correo)->first();

		//buscando seccion del estudiante
		$id_seccion=buscar_id_seccion($id_estudiante);
		$asignaturas=DB::select("SELECT * FROM asignacion WHERE id_prof=".$docente->id." AND id_seccion=".$id_seccion." LIMIT 0,1");
		foreach ($asignaturas as $asig) {
			$id_asignatura=$asig->id_asignatura;
		
			$sql="SELECT * FROM parciales, calificacion_parcial,quimestres WHERE 
                        id_estudiante=".$id_estudiante." AND 
                        quimestres.id=parciales.id_quimestre AND 
                        quimestres.id_periodo=".$id_periodo." AND 
                        calificacion_parcial.id_parcial=parciales.id AND 
                        calificacion_parcial.id_asignatura=".$id_asignatura." 
                        GROUP BY calificacion_parcial.id_asignatura ";
                        //dd($sql);
        
		$buscar2=DB::select($sql);
		}

		$cuantos=count($buscar2);

		$id_parcial=0;

		if($i>0 and $i<4){
			$num=1;
		}else{
			switch ($i) {
				case 4:
					$i=1;
					break;
				case 5:
					$i=2;
					break;
				case 6:
					$i=3;
					break;
				
			}
			$num=2;
		}
		$quimestre=Quimestres::where('id_periodo',$id_periodo)->where('numero',$num)->first();
		$parciales=Parciales::where('id_estudiante',$id_estudiante)->where('id_quimestre',$quimestre->id)->get();
		if(count($parciales)>0 && $cuantos>0){
			$j=0;
			foreach ($parciales as $p) {
				
				$j++;
				if ($j==$i) {
					$id_parcial=$p->id;	
					break;
				} 
				
			}
		}
		
			return $id_parcial;
		
		

	}

	function buscar_calificacion_quimestre($i,$id_estudiante,$id_periodo,$k){
		//k controla si es par inscribir o para mostrar las calificaciones cargadas
		//en caso de que seaa 0 quiere decir que es para las calificaciones cargadas
		
		if ($k==0) {
			
		$correo=Auth::user()->email;
		
		$docente=Personal::where('correo',$correo)->first();
		$c=count($docente);
		//echo $c;
		if($c==0){
			//quiere decir que el usuario que entra no es docente
			//buscando el curso del estudiante en su ultimo periodo lectivo
			
				$sql="SELECT cursos.* FROM inscripciones,secciones,cursos WHERE inscripciones.id_estudiante=".$id_estudiante." AND cursos.id=secciones.id_curso AND inscripciones.id_seccion=secciones.id ";
				//dd($sql);
				$curso = DB::select($sql);
				foreach ($curso as $curso) {
					$id_curso=$curso->id;
				}
			//buscando las asignaturas que ve el estudiante
			//
			$asignaturas=DB::select("SELECT asignaturas.id AS id_asignatura FROM asignaturas WHERE id_curso=".$id_curso);


		}else{
		
		//buscando seccion del estudiante
		$id_seccion=buscar_id_seccion($id_estudiante);

		$asignaturas=DB::select("SELECT * FROM asignacion WHERE id_prof=".$docente->id." AND id_seccion=".$id_seccion."");

		}


		foreach ($asignaturas as $asig) {
			$id_asignatura=$asig->id_asignatura;
		
			$sql="SELECT * FROM quimestrales, calificacion_quimestre,quimestres WHERE 
                        quimestrales.id_estudiante=".$id_estudiante." AND 
                        quimestres.id=quimestrales.id_quimestre AND 
                        quimestres.id_periodo=".$id_periodo." AND 
                        calificacion_quimestre.id_quimestrales=quimestrales.id AND 
                        calificacion_quimestre.id_asignatura=".$id_asignatura." 
                        GROUP BY calificacion_quimestre.id_asignatura ";
            //dd($sql);
        
		$buscar2=DB::select($sql);
		}

		$cuantos=count($buscar2);
		//echo $cuantos;
		//dd($asignaturas);
		//echo $i;
		$quimestre=Quimestres::where('id_periodo',$id_periodo)->where('numero',$i)->first();
		
		$quimestrales=Quimestrales::where('id_estudiante',$id_estudiante)->where('id_quimestre',$quimestre->id)->get();
		$promedio=0;
		$cuantos_q=count($quimestrales);
		if($cuantos_q>0 && $cuantos>0){
			//$j=1;
			//dd($quimestrales);
			foreach ($quimestrales as $q) {
					
				//if ($j==$i) {
					//echo $cuantos_q;
						$suma=0;
						$divide=0;
					$subtotal=DB::select("SELECT * FROM calificacion_quimestre WHERE id_quimestrales=".$q->id);
					//dd($subtotal);
					foreach ($subtotal as $sub) {
						foreach ($asignaturas as $asig) {
							if($asig->id_asignatura == $sub->id_asignatura){
								$suma+=$sub->avg_q_cuantitativa;
								$divide++;
							}
						}
					}
					//echo $suma;
					if($suma!=0){
					$promedio=$suma/$divide;
					$promedio=number_format($promedio,2,".",",");
					
					}else{	
					$promedio=0;
					
					}
					break;
				//} 
				//$j++;	
			}
			//dd($j);
			
			
			//if ($j==$i) {
				if($promedio!=0){
					$nota=$promedio;
				}else{
					$nota="SIN CARGAR";
				}
			/*} else {
				$nota="SIN CARGAR";
			}*/
			
		}else{
				$nota="SIN CARGAR";
			
		}

		return $nota;
		//else para el caso de cuando sea inscripcion
		} else {
			
		
			//quiere decir que el usuario que entra no es docente
			//buscando el curso del estudiante en su ultimo periodo lectivo
			
				$sql="SELECT cursos.* FROM inscripciones,secciones,cursos WHERE inscripciones.id_estudiante=".$id_estudiante." AND cursos.id=secciones.id_curso AND inscripciones.id_seccion=secciones.id ";
				//dd($sql);
				$curso = DB::select($sql);
				foreach ($curso as $curso) {
					$id_curso=$curso->id;
				}
			//buscando las asignaturas que ve el estudiante
			//
			$asignaturas=DB::select("SELECT asignaturas.id AS id_asignatura FROM asignaturas WHERE id_curso=".$id_curso);
			//dd($asignaturas);

		

			$total=count($asignaturas);
			$contar=0;
		foreach ($asignaturas as $asig) {
			$id_asignatura=$asig->id_asignatura;
		
			$sql="SELECT * FROM quimestrales, calificacion_quimestre,quimestres WHERE 
                        quimestrales.id_estudiante=".$id_estudiante." AND 
                        quimestres.id=quimestrales.id_quimestre AND 
                        quimestres.id_periodo=".$id_periodo." AND 
                        calificacion_quimestre.id_quimestrales=quimestrales.id AND 
                        calificacion_quimestre.id_asignatura=".$id_asignatura." 
                        GROUP BY calificacion_quimestre.id_asignatura ";
            //dd($sql);
        	
		$buscar2=DB::select($sql);
		if(count($buscar2)>0){
				$contar++;
		}
		}
		//dd($total);
		$cuantos=count($buscar2);
		//dd($id_periodo);

		$quimestre=Quimestres::where('id_periodo',$id_periodo)->where('numero',$i)->first();
		$quimestrales=Quimestrales::where('id_estudiante',$id_estudiante)->where('id_quimestre',$quimestre->id)->get();
		if(count($quimestrales)>0 && $cuantos>0 && $contar==$total){
			$j=0;
			foreach ($quimestrales as $q) {
				
				$j++;
				if ($j==$i) {
						$suma=0;
						$divide=0;
					$subtotal=DB::select("SELECT * FROM calificacion_quimestre WHERE id_quimestrales=".$q->id);
					foreach ($subtotal as $sub) {
						foreach ($asignaturas as $asig) {
							if($asig->id_asignatura == $sub->id_asignatura){
								$suma+=$sub->avg_total;
								$divide++;
							}
						}
					}
					
					if($suma!=0){
					$promedio=$suma/$divide;
					$promedio=number_format($promedio,2,".",",");
					}else{	
					$promedio=0;
					}
					break;
				} 
				
			}
			if ($j==$i) {
				if($promedio!=0){
				$nota=$promedio;
				}else{
					$nota="SIN CARGAR TODAS";
				}
			
			} else {
				$nota="SIN CARGAR TODAS";
			}
			
		}else{
				$nota="SIN CARGAR TODAS";
			
		}

		return $nota;

		}
		
		
	}

	function bloqueProfesor($bloque, $asignadas){

	    foreach ($asignadas as $asignada){

	        $bloque_asignado = \DB::table('asignacion_bloques')->where([['id_asig', $asignada->id_asignatura], ['id_seccion', $asignada->id_seccion], ['id_periodo', $asignada->id_periodo]])->first();

	        if(!empty($bloque_asignado))
            {

                $validandoBloque = \DB::table('asignacion_bloques')->where([['id_bloque', $bloque], ['id_periodo', $bloque_asignado->id_periodo], ['id_asig', $asignada->id_asignatura], ['id_seccion', $bloque_asignado->id_seccion], ['id_periodo', $asignada->id_periodo]])->first();

                if(!empty($validandoBloque))
                {
                    return true;
                }
            }
        }

    }


    function asignaturaProfesor($bloque, $asignadas){

        foreach ($asignadas as $asignada){

            $bloque_asignado = \DB::table('asignacion_bloques')->where([['id_asig', $asignada->id_asignatura], ['id_seccion', $asignada->id_seccion], ['id_periodo', $asignada->id_periodo]])->first();

            if(!empty($bloque_asignado))
            {
                $validandoBloque = \DB::table('asignacion_bloques')->where([['id_bloque', $bloque], ['id_periodo', $bloque_asignado->id_periodo], ['id_asig', $asignada->id_asignatura], ['id_seccion', $bloque_asignado->id_seccion], ['id_periodo', $asignada->id_periodo]])->first();

                if(!empty($validandoBloque))
                {
                    $asignatura = \DB::table('asignaturas')->where('id', $validandoBloque->id_asig)->first();

                    return $asignatura->codigo;
                }
            }
        }

    }

    function aulaProfesor($bloque, $asignadas){

        foreach ($asignadas as $asignada){

            $bloque_asignado = \DB::table('asignacion_bloques')->where([['id_asig', $asignada->id_asignatura], ['id_seccion', $asignada->id_seccion], ['id_periodo', $asignada->id_periodo]])->first();

            if(!empty($bloque_asignado))
            {
                $validandoBloque = \DB::table('asignacion_bloques')->where([['id_bloque', $bloque], ['id_periodo', $bloque_asignado->id_periodo], ['id_asig', $asignada->id_asignatura], ['id_seccion', $bloque_asignado->id_seccion], ['id_periodo', $asignada->id_periodo]])->first();

                if(!empty($validandoBloque))
                {
                    $aula = \DB::table('aulas')->where('id', $validandoBloque->id_aula)->first();

                    return $aula->nombre;
                }
            }
        }

    }

    function seccionProfesor($bloque, $asignadas){

        foreach ($asignadas as $asignada){

            $bloque_asignado = \DB::table('asignacion_bloques')->where([['id_asig', $asignada->id_asignatura], ['id_seccion', $asignada->id_seccion], ['id_periodo', $asignada->id_periodo]])->first();

            if(!empty($bloque_asignado))
            {
                $validandoBloque = \DB::table('asignacion_bloques')->where([['id_bloque', $bloque], ['id_periodo', $bloque_asignado->id_periodo], ['id_asig', $asignada->id_asignatura], ['id_seccion', $bloque_asignado->id_seccion], ['id_periodo', $asignada->id_periodo]])->first();

                if(!empty($validandoBloque))
                {
                    $seccion = \DB::table('secciones')->where('id', $validandoBloque->id_seccion)->first();

                    return $seccion->literal;
                }
            }
        }

    }


function buscar_id_quimestre($i,$id_estudiante){
		$id_periodo=Session::get('periodo');
		$correo=Auth::user()->email;

		$docente=Personal::where('correo',$correo)->first();
		$id_seccion=buscar_id_seccion($id_estudiante);

		$asignaturas=DB::select("SELECT * FROM asignacion WHERE id_prof=".$docente->id." AND id_seccion=".$id_seccion." LIMIT 0,1");
		foreach ($asignaturas as $asig) {
			$id_asignatura=$asig->id_asignatura;
		
			$sql="SELECT * FROM quimestrales, calificacion_quimestre,quimestres WHERE 
                        id_estudiante=".$id_estudiante." AND 
                        quimestres.id=quimestrales.id_quimestre AND 
                        quimestres.id_periodo=".$id_periodo." AND 
                        calificacion_quimestre.id_quimestrales=quimestrales.id AND 
                        calificacion_quimestre.id_asignatura=".$id_asignatura." 
                        GROUP BY calificacion_quimestre.id_asignatura ";
                        //dd($sql);
        
		$buscar2=DB::select($sql);
		}

		$cuantos=count($buscar2);

		$id_quimestre=0;
		$quimestrales=Quimestrales::where('id_estudiante',$id_estudiante)->get();
		if(count($quimestrales)>0 && $cuantos>0){
			$j=0;
			foreach ($quimestrales as $q) {
				
				$j++;
				if ($j==$i) {
					$id_quimestre=$q->id;	
					break;
				} 
				
			}
		}
		
					return $id_quimestre;
						


	}

	function recuperativos_cargados($id_estudiante)
	{

		$id_periodo=Session::get('periodo');

        //verificando si tiene recuperativos registrados para este periodo
        
        $sql="SELECT * FROM calificacion_recuperativos WHERE id_estudiante=".$id_estudiante." AND id_periodo=".$id_periodo;

        $buscar = DB::select($sql);

        $cuantos=count($buscar);

        switch ($cuantos) {
            case 0:
                $tipo=TipoRecuperativos::find(1);
                break;
            case 1:

                $tipo=TipoRecuperativos::find(2);
                break;
            case 2:
                $tipo=TipoRecuperativos::find(3);
                break;
            case 3:
                $tipo=TipoRecuperativos::find(4);
                break;
            
            
        }

        return $tipo;
	}

	function cuantos_recuperativos_cargados($id_estudiante)
	{

		$id_periodo=Session::get('periodo');

        //verificando si tiene recuperativos registrados para este periodo
        
        $sql="SELECT * FROM calificacion_recuperativos WHERE id_estudiante=".$id_estudiante." AND id_periodo=".$id_periodo;

        $buscar = DB::select($sql);

        $cuantos=count($buscar);


        return $cuantos;
	}

	function calificacion_recuperativo($id_estudiante,$id_periodo){
		
			/*$id_periodo=Session::get('periodo');*/
			$sql="SELECT * FROM calificacion_recuperativos WHERE id_estudiante=".$id_estudiante." AND id_periodo=".$id_periodo;
			//dd($sql);
		$buscar=DB::select($sql);
		$nota=0;
		$cuantos=count($buscar);
		if($cuantos>0){
			foreach ($buscar as $b) {
				$nota=$b->calificacion;
			}
		}
		//dd($nota);
		return $nota;
	}

	function buscar_si_repite($id_estudiante){


		$buscar=DB::select("SELECT * FROM inscripciones WHERE id_estudiante=".$id_estudiante);
		//dd($buscar);
        $encontrado=count($buscar);
        
        if ($encontrado>0) {
            foreach ($buscar as $enc) {
                $id_periodo_last=$enc->id_periodo;
                
            }
            	//$id_periodo_last=$id_periodo_last-1;
                $uno=buscar_calificacion_quimestre(1,$id_estudiante,$id_periodo_last,1);
                $dos=buscar_calificacion_quimestre(2,$id_estudiante,$id_periodo_last,1);
                //dd($uno);
                if($uno!="SIN CARGAR TODAS" || $dos!="SIN CARGAR TODAS"){
                $suma=$uno+$dos;

                $promedio=$suma/2;

                        $promedio=number_format($promedio,2,".",",");

                        if ($promedio>=5.5) {
                            $repite="No";
                        } else {

                        	$nota=calificacion_recuperativo($id_estudiante,$id_periodo_last);


                        	if ($nota<=5.5) {
                        		$repite="Si";
                        	} else {
                        		$repite="No";
                        	}
                        	
                            
                        }
                }else{
                	$repite="SIN CARGAR TODAS";
                }
                        

        } else {
        $repite="No";

        }
        return $repite;
	}
	function buscar_curso_a_inscribir($id_estudiante){

		$buscar=DB::select("SELECT * FROM inscripciones WHERE id_estudiante=".$id_estudiante);
        $encontrado=count($buscar);

        if ($encontrado>0) {
            foreach ($buscar as $enc) {
                $id_periodo_last=$enc->id_periodo;
                $id_curso=$enc->id_curso;

            }

                $uno=buscar_calificacion_quimestre(1,$id_estudiante,$id_periodo_last,1);
                $dos=buscar_calificacion_quimestre(2,$id_estudiante,$id_periodo_last,1);

                $suma=$uno+$dos;

                $promedio=$suma/2;

                        $promedio=number_format($promedio,2,".",",");

                        if ($promedio>=5.5) {
                            
                        } else {

                        	$nota=calificacion_recuperativo($id_estudiante,$id_periodo_last);

                        	if ($nota<=5.5) {
                        		$repite="Si";
                        		$id_curso=$id_curso;
                        	} else {
                        		$nota="No";
                        		$id_c=$id_curso+1;
                        		//dd($id_c);
                        		$buscar3=DB::select("SELECT * FROM cursos WHERE id=".$id_c);
                        		$cuantos=count($buscar3);
                        		if ($cuantos>0) {
                        			foreach ($buscar3 as $b3) {
                        				$id_curso=$b3->id;
                        			}
                        		} else {
                        			$id_curso="Ninguno";
                        		}
                        		
                        	}
                        	
                            
                        }
                        

        } else {
        $id_curso="Todos";
        }
        return $id_curso;
	}

	function buscar_inscrito($id_estudiante,$id_periodo){

		$buscar=DB::select("SELECT * FROM inscripciones WHERE id_estudiante=".$id_estudiante." AND id_periodo=".$id_periodo);

		$encontrado=count($buscar);

		return $encontrado;

	}

	function buscar_lista_secciones($id_curso)
	{
		$secciones=Seccion::where('id_curso',$id_curso)->lists('literal','id');

		return $secciones;
	}

	function periodo($id){
		
		$periodoLectivo = App\Periodos::find($id); 
		$periodoActivo = $periodoLectivo->nombre.'-'.($periodoLectivo->nombre+1);

		return $periodoActivo; 
	}

    function buscarQuimestre($id)
    {
        $quimestre = Quimestres::find($id);

        if ($quimestre->numero == 1) {

            $a = "1ER QUIMESTRE";

        } else {

            $a = "2DO QUIMESTRE";

        }

        return $a;
    }