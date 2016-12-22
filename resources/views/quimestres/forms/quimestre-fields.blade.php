<?php
$asistencia=['FALTAS JUSTIFICADAS','FALTAS INJUSTIFACADAS','ATRASOS JUSTIFICADOS','ATRASOS INJUSTIFICADOS', 'TOTAL DE FALTAS']
?>


<table class="table table-bordered">
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
<tr>
	<td><strong></strong></td>
	<td><strong></strong></td>
	<td><strong></strong></td>
	<td><strong></strong></td>
	<td><strong></strong></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td><strong></strong></td>
	<td><strong</strong></td>
</tr>
{{-- fin del ciclo para traer todas as asignaturas --}}
<tr>	
	<td colspan="5"></td>
	<td colspan="4"><strong>SUMATORIA DE PUNTOS</strong></td>
	<td></td>
	<td></td>
</tr>

<tr>	
	<td colspan="5"><strong></strong></td>
	<td colspan="4"><strong>PROMEDIO DE APROVECHAMIENTO<strong></td>
	<td></td>
	<td></td>
</tr>


<tr>	
	<td colspan="5"><strong></strong></td>
	<td colspan="4"><strong>COMPORTAMIENTO  ESTUDIANTIL<strong></td>
	<td><div class="form-group">{!! Form::select('promedio_comp',$promedio_comp,null,['class' => 'form-control','title' => 'Seleccione el Promedio de Comportamiento','id' => 'promedio_comp'])!!} 
				</div></td>
	<td></td>
</tr>
<tr>
	<td colspan="11"><strong>RECOMENDACIONES</strong></td>
</tr>
<tr>
	<td colspan="11">
		<div class="form-group">
						{!! Form::textarea('recomendaciones',null,['class' => 'form-control', 'placeholder' => 'Felicitaciones por su desemppeño','title' => 'Ingrese alguna recomendación para el estudiante', 'rows' => '2']) !!}
					</div>
	</td>
</tr>
<tr>
	<td></td>
	<td colspan="4" align="center"><strong>ASISTENCIA QUIMESTRAL DETALLADA</strong></td>
	<td colspan="6"></td>
</tr>

@for($i=0;$i< ccount($asistencia);$i++)
<tr>
	<td></td>
	<td><strong>{{$asistencia[$i]}}</strong></td>
	<td></td>
	<td></td>
	<td></td>
	<td colspan="6"></td>
</tr>

@endfor
</tbody>
</table>