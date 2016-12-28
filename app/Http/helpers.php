<?php 
use App\Periodos;
use App\Parciales;
use App\Personal;
use App\Quimestres;
use App\Quimestrales;

	function verificarPeriodo()
	{
		$periodo = Periodos::where('id', Session::get('periodo'))->first();

		return $periodo->status;
	}

	function asignados($bloque, $asignados)
	{
		foreach ($asignados as $as) 
		{
			if($bloque == $as)
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
    
        $suma = $per->sueldo_mens + $per->bono_responsabilidad;

        $pres = $suma-$pagadoTotal;

        return $pagadoTotal;
	}

	function remuneracion($id_personal)
	{
		$sql = \DB::table('remuneracion')->where('id_personal', $id_personal)->first();
		if(!empty($sql))
		{
			foreach ($sql as $key) {
				$capital = ($sql->sueldo_mens+$sql->bono_responsabilidad)-$sql->descuento_iess;
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

	function buscar_dr($id_estudiante){
		 $cc=0;
        $id_periodo=Session::get('periodo');
            $quimestre=Quimestres::where('id_periodo',$id_periodo)->get();
            /*dd($quimestre);*/
            foreach ($quimestre as $q) {
                $parciales=Parciales::where('id_quimestre',$q->id)->where('id_estudiante',$id_estudiante)->get();
                $cuantos=count($parciales);
                if($cuantos>0){

                $cc+=$cuantos;
            	}


            }



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
		$id_periodo=Session::get('periodo');

		$buscar_q=\DB::select("SELECT * FROM quimestrales,quimestres WHERE quimestrales.id_estudiante=".$id_estudiante." AND quimestres.id_periodo=".$id_periodo."");
		$opcion=count($buscar_q);


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

	function buscar_curso($id){

		$id_periodo=Session::get('periodo');
		$sql="SELECT cursos.* FROM inscripciones,cursos WHERE inscripciones.id_estudiante=".$id." AND cursos.id=inscripciones.id_curso AND id_periodo=".$id_periodo;
		//dd($sql);
		$curso = DB::select($sql);
		foreach ($curso as $curso) {
			$id_curso=$curso->id;
		}
		/*$id_curso=0;*/
		return  $id_curso;
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
			
					foreach ($asignaturas as $asig) {
					
					$sql="SELECT calificacion_parcial.* FROM parciales,calificacion_parcial,quimestres WHERE 
					parciales.id_estudiante=".$id_estudiante." AND 
					calificacion_parcial.id_parcial=parciales.id AND 
					parciales.id_quimestre=quimestres.id AND 
					quimestres.id_periodo=".$id_periodo." AND 
					calificacion_parcial.id_asignatura=".$asig->id_asignatura." 
					GROUP BY calificacion_parcial.id_parcial";
					
					$resultado=DB::select($sql);

					}

				$contar=count($resultado);
				//dd($contar);
				if($contar==3){
					$encontrada=1;
				}else{
					if($contar==6){
						$encontrada=2;

					}else{
					$encontrada=0;
					}
				}

			
			
		}

		

		return $encontrada;

	}

	function buscar_mi_asignatura_quimestre($id_estudiante,$id_asignatura,$id_quimestre){

		$id_periodo=Session::get('periodo');
		$sql=DB::select("SELECT * FROM calificacion_quimestre WHERE id_estudiante=".$id_estudiante." AND id_quimestre=".$id_quimestre." AND id_asignatura=".$id_asignatura."");
	$encontrado=count($sql);

		return $encontrado;


	}	

	function buscar_id_parcial($id_estudiante){

		$id_periodo=Session::get('periodo');

		$parcial=Parciales::where('id_estudiante',$id_estudiante)->first();
		
		$id_parcial=$parcial->id;

		return $id_parcial;


	}

	function buscar_id_quimestre($id_estudiante){

		$id_periodo=Session::get('periodo');

		$quimestre=Quimestrales::where('id_estudiante',$id_estudiante)->first();

		$id_quimestre=$quimestre->id_quimestre;

		return $id_quimestre;


	}

	function buscar_asignatura_asignada($id_prof){

		$id_periodo=Session::get('periodo');

		$asignatura=DB::select("SELECT * FROM asignacion WHERE id_prof=".$id_prof." AND id_periodo=".$id_periodo);

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

	function buscando_asignaturas_cargadas($id_estudiante){

		$buscar2=DB::select("SELECT * FROM parciales, calificacion_parcial,quimestres WHERE 
                        id_estudiante=".$id_estudiante." AND 
                        quimestres.id=parciales.id_quimestre AND 
                        quimestres.id_periodo=3 
                        GROUP BY calificacion_parcial.id_asignatura");

                    $cuantos=count($buscar2);

                    return $cuantos;
	}

	function buscando_asignaturas_cargadas2($id_estudiante,$id_parcial,$id_quimestre){

		$buscar2=DB::select("SELECT * FROM parciales, calificacion_parcial,quimestres WHERE 
                        id_estudiante=".$id_estudiante." AND 
                        quimestres.id=parciales.id_quimestre AND 
                        quimestres.id_periodo=3 AND 
                        calificacion_parcial.id_parcial=parcial.id AND 
                        parciales.id=".$id_parcial." AND 
                        parciales.id=".$id_quimestre." 
                        GROUP BY calificacion_parcial.id_asignatura ");

                    $cuantos=count($buscar2);

                    return $cuantos;
	}

	function suma_cargadas($id_estudiante,$id_parcial,$id_quimestre){

		$buscar2=DB::select("SELECT * FROM parciales, calificacion_parcial,quimestres WHERE 
                        id_estudiante=".$id_estudiante." AND 
                        quimestres.id=parciales.id_quimestre AND 
                        quimestres.id_periodo=3 AND 
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

