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


	function asignaturas_a($bloque, $asignatura, $seccion)
	{

		foreach ($asignatura as $asignatura) 
		{
			$sql = \DB::table('asignacion_bloques')->where([['id_bloque', $bloque], ['id_asig', $asignatura], ['id_seccion', $seccion]])->get();

			if($sql > 0)
			{
				$sql = \DB::table('asignaturas')->where('id', $asignatura)->get();
			
				return $sql;
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
