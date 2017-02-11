<style type="text/css">
	
	.vertical{
		position:relative;
		writing-mode:tb-rl;
		filter:flipH() flipV();
		max-width: 40px;
	}

</style>
 {!! Form::hidden('id_estudiante',$estudiantes->id,['id' => 'id_estudiante']); !!}

<?php
$color=['#32CD32','#F5F5DC','#1E90FF','#FF69B4','#FF4500'];
$faltas=['FALTAS JUSTIFICADAS','FALTAS INJUSTIFICADAS','ATRASOS JUSTIFICADOS','ATRASOS INJUSTIFICADOS'];
$i=1;
$j=0; ?>

	<table class="table table-bordered">
		<thead>
			
			<tr>
			<th>#</th>
			<th><strong>Asignatura</strong></th>
		@foreach($categorias as $categorias)
			<th style="width:40px;" align="center" bgcolor="<?=$color[$j]?>" >
				<div class="vertical"> 
			{{ $categorias->categoria}}
			</div>
			</th>
			<?php $j++; ?>
		@endforeach
			<th style="width:30px;" align="center" bgcolor="#FFD700"><div class="vertical" >Promedio Total</div></th>
			<th style="width:30px;" align="center" bgcolor="#F0F8FF"><div class="vertical" >Cualitativa</div></th>
			
			</tr>
			</thead>
			<tbody>
			
			@foreach($docentes as $doce)

			
			<?php 
			$id_asig=$doce->id_asignatura; ?>
			@foreach($asignaturas as $asig)
			@if($id_asig==$asig->id)
			<tr align="center">

			<td>{{$i}}</td>
			<td>{!! Form::hidden('id_asignatura[]',$id_asig,['id' => 'id_asignatura']) !!}    {{$asig->asignatura}}</td>
			<td>
				<div class="form-group">{!! Form::number('deberes[]',1,['class' => 'form-control', 'style' => 'width:5em','placeholder' => '0.00','title' => 'Ingrese la calificación de la categoria de Deberes para esta asignatura', 'min' => '1', 'max' => '10', 'required' => 'required', 'onkeyup' => 'promediar()', 'id' => 'deberes', 'maxlength' => '4','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);','onchange' => 'promediar()'])!!} 
				</div>
			</td>
			<td>
				<div class="form-group">{!! Form::number('individuales[]',1,['class' => 'form-control', 'style' => 'width:5em','placeholder' => '0.00','title' => 'Ingrese la calificación de la categoria Actividades Individuales para esta asignatura', 'min' => '1', 'max' => '10', 'required' => 'required', 'id' => 'individuales', 'maxlength' => '4','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);','onchange' => 'promediar()'])!!} 
				</div>
			</td>
			<td>
				<div class="form-group">{!! Form::number('grupales[]',1,['class' => 'form-control', 'style' => 'width:5em','placeholder' => '0.00','title' => 'Ingrese la calificación de la categoria de Grupales para esta asignatura', 'min' => '1', 'max' => '10', 'required' => 'required', 'id' => 'grupales', 'maxlength' => '4','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);','onchange' => 'promediar()'])!!} 
				</div>
			</td>
			<td>
				<div class="form-group">{!! Form::number('lecciones[]',1,['class' => 'form-control', 'style' => 'width:5em','placeholder' => '0.00','title' => 'Ingrese la calificación de la categoria de Lecciones para esta asignatura', 'min' => '1', 'max' => '10', 'required' => 'required', 'id' => 'lecciones', 'maxlength' => '4','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);','onchange' => 'promediar()'])!!} 
				</div>
			</td>
			<td>
				<div class="form-group">{!! Form::number('aportes[]',1,['class' => 'form-control', 'style' => 'width:5em','placeholder' => '0.00','title' => 'Ingrese la calificación de la categoria de Aportes para esta asignatura', 'min' => '1', 'max' => '10', 'required' => 'required','id' => 'aportes', 'maxlength' => '4','oninput' => 'javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);','onchange' => 'promediar()'])!!} 
				</div>
			</td>
			<td><div class="form-group">{!! Form::text('promedio[]',1,['class' => 'form-control', 'style' => 'width:5em','placeholder' => '0.00','title' => 'Promedio Total', 'required' => 'required','id' => 'promedio','disabled' => 'disabled'])!!} 
				</div>
				{!! Form::hidden('promedio2[]',1,['id' => 'promedio2'])!!} 
				
				</td>
			<td><div class="form-group">{!! Form::text('cualitativa[]',null,['class' => 'form-control', 'style' => 'width:5em','placeholder' => '','title' => 'Calificación Cualitativa', 'required' => 'required','id' => 'cualitativa','disabled' => 'disabled'])!!} 
				</div>
				{!! Form::hidden('cualitativa2[]',null,['id' => 'cualitativa2'])!!} 
				</td>

			</tr>
			<?php $i++; ?>
			@endif
			@endforeach
			@endforeach
			<tr>
			<td colspan="7"><strong>PROMEDIO DE APROVECHAMIENTO</strong></td>
				<td align="center"><div class="form-group">{!! Form::text('promedio_ap',1,['class' => 'form-control', 'style' => 'width:5em','placeholder' => '0.00','title' => 'Promedio de Aprovechamiento', 'required' => 'required','id' => 'promedio_ap','disabled' => 'disabled'])!!} 
				</div>
				{!! Form::hidden('promedio_ap2',1,['id' => 'promedio_ap2'])!!} 
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="7"><strong>PROMEDIO DE COMPORTAMIENTO</strong></td>
				<td colspan="2"><div class="form-group">{!! Form::select('promedio_comp',$promedio_comp,null,['class' => 'form-control','title' => 'Seleccione el Promedio de Comportamiento','id' => 'promedio_comp'])!!} 
				</div></td>
			</tr>
			<tr>
				<td colspan="2"><strong>OBSERVACIONES</strong></td>
				<td colspan="7">
					<div class="form-group">
						{!! Form::textarea('observaciones',null,['class' => 'form-control', 'placeholder' => 'Aprobado para el siguiente parcial','title' => 'Ingrese alguna observación con respecto a este parcial', 'rows' => '2']) !!}
					</div>
				</td>
			
			<?php $k=0; ?>
			@foreach($equivalencias as $equivalencias)
			<tr>
				<td colspan="5">{{$equivalencias->literales}}={{$equivalencias->descripcion}}</td>
				<td>{{$equivalencias->minimo}} - {{$equivalencias->maximo}}</td>
				<td colspan="2">{{$faltas[$k]}}</td>
				<td>
				<div class="form-group" >	{!! Form::number('faltas[]',0,['class' => 'form-control', 'style' => 'width:5em','placeholder' => '0','title' => 'Ingrese la cantidad de '.$faltas[$k], 'min' => '0', 'required' => 'required'])!!} 
				</div>
				</td>


			</tr>
			<?php $k++; ?>
			@endforeach
			@foreach($comportamiento as $comportamiento)
				<tr>
					<td><strong>{{$comportamiento->literal}}</strong></td>
					<td colspan="8">{{$comportamiento->descripcion}}</td>
				</tr>

			@endforeach
			
		</tbody>


	</table>


