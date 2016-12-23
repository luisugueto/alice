<?php 

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
