<?php
$asistencia=['FALTAS JUSTIFICADAS','FALTAS INJUSTIFACADAS','ATRASOS JUSTIFICADOS','ATRASOS INJUSTIFICADOS', 'TOTAL DE FALTAS'];
?>
{!!  Form::text('id_estudiante',$estudiantes->id); !!}
{!!  Form::text('id_quimestre',$quimestres->id) !!}

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
			@foreach($docentes as $doce)

			{!! Form::hidden('id_personal',$doce->id_prof); !!}
			<?php $i=1;
			$id_asig=$doce->id_asignatura; ?>
			@foreach($asignaturas as $asig)
			@if($id_asig==$asig->id)
					<tr>
						<td>{{$i}}</td>
			<td>{!! Form::hidden('id_asignatura[]',$id_asig,['id' => 'id_asignatura']) !!}    {{$asig->asignatura}}</td>
					<?php $suma=0; ?>
					@foreach($parciales as $parcial)
						<?php $id_parcial=$parcial->id; ?>
						@foreach($parciales_asignatura as $pa)
							@if($id_parcial== $pa->id_parcial and $id_asig==$pa->id_asignatura)
							<?php $suma=$suma + $pa->avg_total; ?>
								<td align="center"><strong>{{$pa->avg_total}}</strong></td>
							@endif

						@endforeach
					@endforeach

				{{-- 	cálculo de promedio de parciales --}}
					<?php 
					$sfsuma=$suma/3;

					 ?>
					<td align="center"><strong>{!! Form::hidden('avg_gp[]',$sfsuma,['id' => 'avg_gp']) !!}   {{$suma}}</strong></td>
					<?php $sfsuma80=($sfsuma*80)/100;
							$cfsuma80=number_format($sfsuma80,2,".",","); ?>	
						<td  align="center"><strong>{!! Form::hidden('avg_gp80[]',$cfsuma80,['required' => 'required','id' => 'avg_gp80']) !!}   {{$cfsuma80}}</strong></td>

						<td  align="center"> <div class="form-group">{!! Form::number('examen_q[]',1,['class' => 'form-control', 'style' => 'width:5em','placeholder' => '0.00','title' => 'Ingrese la calificación del examen quimestral', 'min' => '1', 'max' => '10', 'required' => 'required','id' => 'examen_q', 'maxlength' => '4','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);','onchange' => 'promediar2()','onkeyup' => 'promediar2()'])!!} 
				</div> </td>
						<td>{!! Form::text('examen_q2[]',1,['class' => 'form-control', 'style' => 'width:5em','placeholder' => '0.00','title' => 'Examen Quimestral 20%', 'min' => '1', 'max' => '10', 'required' => 'required','id' => 'examen_q2', 'maxlength' => '4','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);','disabled' => 'disabled'])!!}

							{!! Form::hidden('examen_q20[]',1,['required' => 'required','id' => 'examen_q20'])!!} 
						 </td>
						<td>{!! Form::text('avg_q_cuantitativa[]',1,['class' => 'form-control', 'style' => 'width:5em','placeholder' => '0.00','title' => 'Promedio quimestral cuantitativo por asignatura', 'min' => '1', 'max' => '10', 'required' => 'required','id' => 'avg_q_cuantitativa', 'maxlength' => '4','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);','disabled' => 'disabled'])!!}

							{!! Form::hidden('avg_q_cuantitativa2[]',1,['required' => 'required','id' => 'avg_q_cuantitativa2'])!!} </td>
						<td><div class="form-group">{!! Form::text('avg_q_cualitativa[]',null,['class' => 'form-control', 'style' => 'width:5em','placeholder' => '','title' => 'Calificación Cualitativa', 'required' => 'required','id' => 'avg_q_cualitativa','disabled' => 'disabled'])!!} 
				</div>
				{!! Form::hidden('avg_q_cualitativa2[]',null,['id' => 'avg_q_cualitativa2'])!!} </td>
					</tr>
			<?php $i++; ?>
			@endif
			@endforeach
			@endforeach
{{-- fin del ciclo para traer todas as asignaturas --}}
<tr>	
	<td colspan="5"></td>
	<td colspan="4"><strong>SUMATORIA DE PUNTOS</strong></td>
	<td>{!! Form::text('sumatoria',1,['class' => 'form-control', 'style' => 'width:5em','placeholder' => '0.00','title' => '>Sumatoria de Calificaciones', 'min' => '1', 'max' => '10', 'required' => 'required','id' => 'sumatoria', 'maxlength' => '4','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);','disabled' => 'disabled'])!!}

		{!! Form::hidden('sumatoria2',1,['required' => 'required','id' => 'sumatoria2'])!!}</td>
	<td></td>
</tr>

<tr>	
	<td colspan="5"><strong></strong></td>
	<td colspan="4"><strong>PROMEDIO DE APROVECHAMIENTO<strong></td>
	<td>{!! Form::text('avg_aprovechamiento_q',1,['class' => 'form-control', 'style' => 'width:5em','placeholder' => '0.00','title' => '>Sumatoria de Calificaciones', 'min' => '1', 'max' => '10', 'required' => 'required','id' => 'avg_aprovechamiento_q', 'maxlength' => '4','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);','disabled' => 'disabled'])!!}
		
		{!! Form::hidden('avg_aprovechamiento_q2',1,['required' => 'required','id' => 'avg_aprovechamiento_q2'])!!}

	 </td>
	<td></td>
</tr>


<tr>	
	<td colspan="5"><strong></strong></td>
	<td colspan="4"><strong>COMPORTAMIENTO  ESTUDIANTIL<strong></td>
	<td><div class="form-group">{!! Form::select('promedio_comp',$promedio_comp,null,['class' => 'form-control','title' => 'Seleccione el Promedio de Comportamiento','id' => 'promedio_comp'])!!} 
				
		</div>
	</td>
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
	<td ><strong>TOTAL DE FALTAS</strong></td>
	<td colspan="5"></td>
</tr>
<?php
	$fj=0;
	$fi=0;
	$aj=0;
	$ai=0;


 ?>
@for($i=0;$i< count($asistencia)-1;$i++)
<tr>
	<td></td>
	<td><strong>{{$asistencia[$i]}}</strong></td>
	@if($i==0)
	@for($j=0;$j<3;$j++)
	<?php $fj+=$parciales[$j]->faltas_j; ?>
	<td>{{$parciales[$j]->faltas_j}}</td>

	@endfor
	<td> {{$fj}} {!! Form::hidden('total_faltas_j',$fj); !!} </td>
	<td colspan="5"></td>
	@endif
	@if($i==1)
	@for($j=0;$j<3;$j++)
	<?php $fi+=$parciales[$j]->faltas_i; ?>
	<td>{{$parciales[$j]->faltas_i}}</td>
	@endfor
	<td> {{$fi}} {!! Form::hidden('total_faltas_i',$fi); !!}</td>
	<td colspan="5"></td>
	@endif
	@if($i==2)
	@for($j=0;$j<3;$j++)
	<?php $aj+=$parciales[$j]->atrasos_j; ?>
	<td>{{$parciales[$j]->atrasos_j}}</td>
	@endfor
	<td> {{$aj}} {!! Form::hidden('total_atrasos_j',$aj); !!} </td>
	<td colspan="5"></td>
	@endif
	@if($i==3)
	@for($j=0;$j<3;$j++)
	<?php $ai+=$parciales[$j]->atrasos_i ?>
	<td>{{$parciales[$j]->atrasos_i}}</td>
	@endfor
	<td> {{$aj}} {!! Form::hidden('total_atrasos_i',$ai); !!} </td>
	<td colspan="5"></td>
	@endif
	
</tr>
@endfor



</tbody>
</table>