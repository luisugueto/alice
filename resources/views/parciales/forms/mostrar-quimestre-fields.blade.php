<?php
$asistencia=['FALTAS JUSTIFICADAS','FALTAS INJUSTIFACADAS','ATRASOS JUSTIFICADOS','ATRASOS INJUSTIFICADOS', 'TOTAL DE FALTAS'];
?>


<table id="example1" class="table table-bordered table-hover">
<thead>
	<th colspan="2">&nbsp;</th>
	<th colspan="3">DETALLES DE PARCIALES</th>
	<th>PROMEDIO GENERAL DEL PARCIAL</th>
	<th>PROMEDIO GENERAL DE PARCIALES (80%)</th>
	<th>EXAMEN QUIMESTRAL</th>
	<th>EXAMEN QUIMESTRAL (20%)</th>
	<th colspan="2">PROMEDIO QUIMESTRAL</th>
</thead>
<tbody>
<tr>
	<td><strong>NRO</strong></td>
	<td><strong>ASIGNATURA</strong></td>
	<td><strong>PRIMERO</strong></td>
	<td><strong>SEGUNDO</strong></td>
	<td><strong>TERCERO</strong></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td><strong>CUANTITATIVA</strong></td>
	<td><strong>CUALITATIVA</strong></td>
</tr>
{{-- aqui va el ciclo para traer todas as asignaturas --}}
			@foreach($docentes as $doce)

			<?php $i=1;	$id_asig=$doce->id_asignatura; ?>
					@foreach($asignaturas as $asig)
							<tr>
								@if($id_asig==$asig->id)
										
											<td>{{$i}}</td>
											<td>{{$asig->asignatura}}</td>
										<?php $suma=0; ?>
										{{-- mostrando parcial 1 --}}
								@endif
								@foreach($parcial1 as $p1)
									@if($asig->id==$p1->id_asignatura AND $asig->id==$id_asig)
									<td>{{$p1->avg_total}}</td>
										
									@endif

								@endforeach	

								@foreach($parcial2 as $p2)
									@if($asig->id==$p2->id_asignatura AND $asig->id==$id_asig)
									<td>{{$p2->avg_total}}</td>
										
									@endif

								@endforeach	

								@foreach($parcial3 as $p3)
									@if($asig->id==$p3->id_asignatura AND $asig->id==$id_asig)
									<td>{{$p3->avg_total}}</td>
										
									@endif

								@endforeach	

								<?php $sumatoria=0; ?>

								@foreach($buscar2 as $b2)
									@if($asig->id==$b2->id_asignatura AND $asig->id==$id_asig)
									<?php $avg_gp=number_format($b2->avg_gp,2,".",","); ?>
									<td>{{$avg_gp}}</td>
									<td>{{ $b2->avg_gp80 }}</td>
									<td>{{ $b2->examen_q }}</td>
									<td>{{ $b2->examen_q20 }}</td>
									<td>{{ $b2->avg_q_cuantitativa }} </td>	
									<td>{{ $b2->equivalencias->literales}}</td>
									@endif
										<?php $sumatoria+=$b2->avg_q_cuantitativa; ?>
								@endforeach	
								<?php $promedio=$sumatoria/count($buscar2); 
								$promedio=number_format($promedio,2,".",",");?>



										
								
								<?php $i++; ?>
							</tr>
					@endforeach

					


			@endforeach

{{-- fin del ciclo para traer todas as asignaturas --}}
<tr>	
	<td colspan="5"></td>
	<td colspan="4"><strong>SUMATORIA DE PUNTOS</strong></td>
	<td>{{ $sumatoria }}
	<td></td>
</tr>

<tr>	
	<td colspan="5"><strong></strong></td>
	<td colspan="4"><strong>PROMEDIO DE APROVECHAMIENTO<strong></td>
	<td>{{ $promedio}}
	 </td>
	<td></td>
</tr>


<tr>	
	<td colspan="5"><strong></strong></td>
	<td colspan="4"><strong>COMPORTAMIENTO  ESTUDIANTIL<strong></td>
	<td>{{ $buscar4->comportamiento->literal }}</td>
	<td></td>
</tr>
<tr>
	<td colspan="11"><strong>RECOMENDACIONES</strong></td>
</tr>
<tr>
	<td colspan="11">
		{{ $buscar4->recomendaciones }}
	</td>
</tr>
<tr>
	<td></td>
	<td colspan="4" align="center"><strong>ASISTENCIA QUIMESTRAL DETALLADA</strong></td>
	<td ><strong>TOTAL DE FALTAS</strong></td>
	<td colspan="5"></td>
</tr>
<tr>
	<td></td>
	<td colspan="4"><strong>{{$asistencia[0]}}</strong></td>
	
	<td>{{$buscar4->total_faltas_j}}</td>
	<td colspan="5"></td>
</tr>
<tr>
	<td></td>
	<td colspan="4"><strong>{{$asistencia[1]}}</strong></td>
	
	<td>{{$buscar4->total_faltas_i}}</td>
	<td colspan="5"></td>
</tr>
<tr>
	<td></td>
	<td colspan="4"><strong>{{$asistencia[2]}}</strong></td>
	
	<td>{{$buscar4->total_atrasos_j}}</td>
	<td colspan="5"></td>
</tr>
<tr>
	<td></td>
	<td colspan="4"><strong>{{$asistencia[3]}}</strong></td>
	
	<td>{{$buscar4->total_atrasos_i}}</td>
	<td colspan="5"></td>
</tr>


</tbody>
</table>