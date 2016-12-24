<?php 
use App\Periodos;

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
        /*DB::connection()->setFetchMode(PDO::FETCH_ASSOC);

			$sql = DB::select('SELECT * FROM asignacion_bloques as b INNER JOIN asignaturas as a ON a.id=b.id_asig WHERE b.id_bloque = '.$id_bloque.' AND b.id_asig = '.$id_asignatura.' AND b.id_seccion = '.$id_seccion.' ');
			$contar = count($sql);
		
			foreach ($sql as $key) {
				return	$codigo = $key['codigo'];
			}	*/	
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
        /*DB::connection()->setFetchMode(PDO::FETCH_ASSOC);

			$sql = DB::select('SELECT * FROM asignacion_bloques as b INNER JOIN asignaturas as a ON a.id=b.id_asig WHERE b.id_bloque = '.$id_bloque.' AND b.id_asig = '.$id_asignatura.' AND b.id_seccion = '.$id_seccion.' ');
			$contar = count($sql);
		
			foreach ($sql as $key) {
				return	$codigo = $key['codigo'];
			}	*/	
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

<<<<<<< HEAD
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

				$cargar=$b." ".$a;

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

=======
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
>>>>>>> 18ce1c5557511c84057a8e5e7e7fbcf7a748ae12
	}
