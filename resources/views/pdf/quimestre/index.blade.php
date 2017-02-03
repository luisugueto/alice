<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>{{ strtoupper($estudiantes->apellido_paterno." ".$estudiantes->apellido_materno.", ".$estudiantes->nombres) }}</title>
	</head>
	<style>
		table {
			border-collapse: collapse;
			font-size: 15px;
		}

		table th {
			font-size: 12px;
		}
	</style>
<body>

	<?php
		$asistencia=['FALTAS JUSTIFICADAS','FALTAS INJUSTIFACADAS','ATRASOS JUSTIFICADOS','ATRASOS INJUSTIFICADOS', 'TOTAL DE FALTAS'];
	?>
	<div style="padding-top: 50px; padding-left: 85px; position:absolute;">
		<img src="img/logo.jpg" alt="" width="200px" style="margin-top: -30px">
	</div>
	<div align="center" style="padding-top: -10px;">
		<h3>ESCUELA DE EDUCACIÓN BÁSICA PARTICULAR</h3>
		<h4 style="padding-top: -20px;">"MARÍA MONTESSORI"</h4>
		<h6 style="padding-top: -20px;">FLORIDA NORTE COOP UNIDOS SOMOS MAS MZ 385 Sl 22</h6>
		<h3 style="padding-top: -20px;">INFORME DE CALIFICACIONES DEL {{ buscarQuimestre($buscar4->id) }}</h3>
	</div>
	<div style="padding-left: 60px; padding-top: -30px;">
		<h5 style="font-weight:normal;"><strong>ESTUDIANTE:</strong>  {{ strtoupper($estudiantes->apellido_paterno." ".$estudiantes->apellido_materno.", ".$estudiantes->nombres) }}</h5>
	</div>
<table border="1">
	<thead>
		<tr>
			<th colspan="2">&nbsp;</th>
			<th colspan="3">DETALLE DE PARCIALES</th>
			<th>PROMEDIO GENERAL DEL PARCIAL</th>
			<th>PROMEDIO GENERAL DE PARCIALES (80%)</th>
			<th>EXAMEN QUIMESTRAL</th>
			<th>EXAMEN QUIMESTRAL (20%)</th>
			<th colspan="2">PROMEDIO QUIMESTRAL</th>
		</tr>
	</thead>
	<tbody>
		<tr style="font-size: 11px;">
			<td><strong>NRO</strong></td>
			<td><strong>ASIGNATURA</strong></td>
			<td><strong>PRIMER</strong></td>
			<td><strong>SEGUNDO</strong></td>
			<td><strong>TERCER</strong></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><strong>CUANTITATIVA</strong></td>
			<td><strong>CUALITATIVA</strong></td>
		</tr>

		@foreach($docentes as $doce)

			<?php $i=1;	$id_asig=$doce->id_asignatura; ?>

			<tr style="page-break-after: always; text-align: center;">
			@foreach($asignaturas as $asig)
					@if($id_asig==$asig->id)

						<td>{{ $i }}</td>
						<td align="left" style="font-size: 11px;">{{  strtr(strtoupper($asig->asignatura),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ") }}</td>

						<?php $suma=0; ?>

					@endif

					@foreach($parcial1 as $p1)

						@if($asig->id==$p1->id_asignatura AND $asig->id==$id_asig)

							<td>{{$p1->avg_total}}</td>

						@endif

					@endforeach

					@foreach($parcial2 as $p2)

						@if($asig->id==$p2->id_asignatura AND $asig->id==$id_asig)

							<td>{{ $p2->avg_total }}</td>

						@endif

					@endforeach

					@foreach($parcial3 as $p3)

						@if($asig->id==$p3->id_asignatura AND $asig->id==$id_asig)

							<td>{{ $p3->avg_total }}</td>

						@endif

					@endforeach

					<?php $sumatoria=0; ?>

					@foreach($buscar2 as $b2)

						@if($asig->id==$b2->id_asignatura AND $asig->id==$id_asig)

							<?php $avg_gp=number_format($b2->avg_gp,2,".",","); ?>

							<td style="background-color: #afd4e3;">{{ $avg_gp }}</td>
							<td style="background-color: #f1c8c1;">{{ $b2->avg_gp80 }}</td>
							<td style="background-color: #afd4e3;">{{ $b2->examen_q }}</td>
							<td style="background-color: #f1c8c1;">{{ $b2->examen_q20 }}</td>
							<td style="background-color: #afd4e3;">{{ $b2->avg_q_cuantitativa }} </td>
							<td style="background-color: #f1c8c1;">{{ $b2->equivalencias->literales}}</td>

						@endif

						<?php $sumatoria+=$b2->avg_q_cuantitativa; ?>

					@endforeach

					<?php
						$promedio=$sumatoria/count($buscar2);
						$promedio=number_format($promedio,2,".",",");
						$i++;
					?>

			@endforeach
			</tr>
		@endforeach

		<tr style="font-size: 11px;">
			<td colspan="5"></td>
			<td colspan="4"><strong>SUMATORIA DE PUNTOS</strong></td>
			<td align="center" style="background-color: #b6b3c1;">{{ $sumatoria }}</td>
			<td></td>
		</tr>

		<tr style="font-size: 11px;">
			<td colspan="5"><strong></strong></td>
			<td colspan="4"><strong>PROMEDIO DE APROVECHAMIENTO</strong></td>
			<td align="center" style="background-color: #b6b3c1;">{{ $promedio }}</td>
			<td></td>
		</tr>


		<tr style="font-size: 11px;">
			<td colspan="5"><strong></strong></td>
			<td colspan="4"><strong>COMPORTAMIENTO  ESTUDIANTIL</strong></td>
			<td align="center" style="background-color: #b6b3c1;" >{{ $buscar4->comportamiento->literal }}</td>
			<td></td>
		</tr>
		<tr>
			<td colspan="11" style="font-size: 11px;"><strong>RECOMENDACIONES</strong></td>
		</tr>
		<tr>
			<td colspan="11">
				@if ($buscar4->recomendaciones == '')
					<br>
				@else
					{{ $buscar4->recomendaciones }}
				@endif
			</td>
		</tr>
		<tr style="font-size: 11px;">
			<td colspan="5" align="center"><strong>ASISTENCIA QUIMESTRAL DETALLADA</strong></td>
			<td><strong>TOTAL DE FALTAS</strong></td>
			<td colspan="5"></td>
		</tr>
		<tr style="font-size: 11px;">
			<td colspan="5"><strong>{{ $asistencia[0] }}</strong></td>
			<td align="center">{{$buscar4->total_faltas_j}}</td>
			<td colspan="5"></td>
		</tr>
		<tr style="font-size: 11px;">
			<td colspan="5"><strong>{{ $asistencia[1] }}</strong></td>
			<td align="center">{{$buscar4->total_faltas_i}}</td>
			<td colspan="5"></td>
		</tr>
		<tr style="font-size: 11px;">
			<td colspan="5"><strong>{{ $asistencia[2] }}</strong></td>
			<td align="center">{{$buscar4->total_atrasos_j}}</td>
			<td colspan="5"></td>
		</tr>
		<tr style="font-size: 11px;">
			<td colspan="5"><strong>{{ $asistencia[3] }}</strong></td>
			<td align="center">{{$buscar4->total_atrasos_i}}</td>
			<td colspan="5"></td>
		</tr>
	</tbody>
</table>
<div style="padding-top: 10px; width: 400px; text-align: center; padding-left: -110px; font-size: 13px;">
	____________________
	<br>
	DIRECTORA
</div>
<div style="padding-top: -38px; width: 400px; text-align: center; padding-left: 300px; font-size: 13px;">
	____________________
	<br>
	DOCENTE
</div>
</body>
</html>
