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

			
			<?php $id_asig=$doce->id_asignatura;

			 ?>
			@foreach($buscar2 as $asig)
			@if($id_asig==$asig->id_asignatura && $asig->id_estudiante==$estudiantes->id)
			<tr align="center">

			<td>{{$i}}</td>
			<td>  {{$asig->asignatura}}</td>
			<td>
				@if($asig->id_categoria==$categorias->id)

					{{$asig->calificacion}}

				@endif
			</td>
			<td>
				@if($asig->id_categoria==$categorias->id)

					{{$asig->calificacion}}

				@endif
			</td>
			<td>
				@if($asig->id_categoria==$categorias->id)

					{{$asig->calificacion}}

				@endif
			</td>
			<td>
				@if($asig->id_categoria==$categorias->id)

					{{$asig->calificacion}}

				@endif
			</td>
			<td>
				@if($asig->id_categoria==$categorias->id)

					{{$asig->calificacion}}

				@endif
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
			
			
		</tbody>


	</table>


