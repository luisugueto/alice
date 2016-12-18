<style type="text/css">
	
	.vertical{
		position:relative;
		writing-mode:tb-rl;
		filter:flipH() flipV()

	}

</style>

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
			<th align="center" bgcolor="<?=$color[$j]?>" >
				
			{{ $categorias->categoria}}
			
			</th>
			<?php $j++; ?>
		@endforeach
			<th align="center" bgcolor="#FFD700">Promedio Total</th>
			<th align="center" bgcolor="#F0F8FF">Cualitativa</th>
			
			</tr>
			</thead>
			<tbody>
			@foreach($asignaturas as $asignaturas)
			<tr align="center">

			<td>{{$i}}</td>
			<td>{{$asignaturas->asignatura}}</td>
			<td>
				<div class="form-group">{!! Form::number('deberes[]',null,['class' => 'form-control', 'style' => 'width:5em','placeholder' => '0.00','title' => 'Ingrese la calificación de la categoria de Deberes para esta asignatura', 'min' => '1.00', 'max' => '10', 'required' => 'required'])!!} 
				</div>
			</td>
			<td>
				<div class="form-group">{!! Form::number('individuales[]',null,['class' => 'form-control', 'style' => 'width:5em','placeholder' => '0.00','title' => 'Ingrese la calificación de la categoria Actividades Individuales para esta asignatura', 'min' => '1.00', 'max' => '10', 'required' => 'required'])!!} 
				</div>
			</td>
			<td>
				<div class="form-group">{!! Form::number('grupales[]',null,['class' => 'form-control', 'style' => 'width:5em','placeholder' => '0.00','title' => 'Ingrese la calificación de la categoria de Grupaes para esta asignatura', 'min' => '1.00', 'max' => '10', 'required' => 'required'])!!} 
				</div>
			</td>
			<td>
				<div class="form-group">{!! Form::number('lecciones[]',null,['class' => 'form-control', 'style' => 'width:5em','placeholder' => '0.00','title' => 'Ingrese la calificación de la categoria de Lecciones para esta asignatura', 'min' => '1.00', 'max' => '10', 'required' => 'required'])!!} 
				</div>
			</td>
			<td>
				<div class="form-group">{!! Form::number('aportes[]',null,['class' => 'form-control', 'style' => 'width:5em','placeholder' => '0.00','title' => 'Ingrese la calificación de la categoria de Aportes para esta asignatura', 'min' => '1.00', 'max' => '10', 'required' => 'required'])!!} 
				</div>
			</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>

			</tr>
			<?php $i++?>
			@endforeach
			<tr>
			<td colspan="7"><strong>PROMEDIO DE APROVECHAMIENTO</strong></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="7"><strong>PROMEDIO DE COMPORTAMIENTO</strong></td>
				<td colspan="2"></td>
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
			@endforeach
			@foreach($comportamiento as $comportamiento)
				<tr>
					<td><strong>{{$comportamiento->literal}}</strong></td>
					<td colspan="8">{{$comportamiento->descripcion}}</td>
				</tr>

			@endforeach
			
		</tbody>


	</table>


