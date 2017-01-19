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
		@foreach($categorias as $categ)
			<th style="width:40px;" align="center" bgcolor="<?=$color[$j]?>" >
				<div class="vertical"> 
			{{ $categ->categoria}}
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
			@foreach($asignaturas as $asig)
			@if($id_asig==$asig->id)
			 <tr align="center">

			<td>{{$i}}</td>
			<td>  {{$asig->asignatura}}  </td>
				{{-- primera categoria (deberes)--}}
				@foreach($categorias as $cat)
					@if($cat->id==1)		
						<?php $id_cat=$cat->id; ?>
						@foreach($buscar2 as $b2)
							

									@if($id_asig==$b2->id_asignatura and $b2->id_categoria==$id_cat)
											<td>{{ $b2->calificacion }}</td>
											@break;
									@endif		

						@endforeach
					@endif
					@if($cat->id==2)		
						<?php $id_cat=$cat->id; ?>
						@foreach($buscar2 as $b2)
							

									@if($id_asig==$b2->id_asignatura and $b2->id_categoria==$id_cat)
											<td>{{ $b2->calificacion }}</td>
											@break;
									@endif		

						@endforeach
					@endif

					

					@if($cat->id==3)		
						<?php $id_cat=$cat->id; ?>
						@foreach($buscar2 as $b2)
							

									@if($id_asig==$b2->id_asignatura and $b2->id_categoria==$id_cat)
											<td>{{ $b2->calificacion }}</td>
											@break;
									@endif		

						@endforeach
					@endif

					@if($cat->id==4)		
						<?php $id_cat=$cat->id; ?>
						@foreach($buscar2 as $b2)
							

									@if($id_asig==$b2->id_asignatura and $b2->id_categoria==$id_cat)
											<td>{{ $b2->calificacion }}</td>
											@break;
									@endif		

						@endforeach
					@endif

					@if($cat->id==5)		
						<?php $id_cat=$cat->id; ?>
						@foreach($buscar2 as $b2)
							

									@if($id_asig==$b2->id_asignatura and $b2->id_categoria==$id_cat)
											<td>{{ $b2->calificacion }}</td>
											@break;
									@endif		

						@endforeach
					@endif
				@endforeach
				<?php $suma=0; ?>
				@foreach($buscar3 as $b3)
						<?php $suma= $suma+$b3->avg_total; ?>
						@if($id_asig==$b3->id_asignatura)

							

							<td>{{ $b3->avg_total }}</td>
							<td>{{ $b3->equivalencias->literales }}</td>

							

						@endif

				@endforeach
				

				
			<?php $i++; ?>
			@endif
			@endforeach
			@endforeach
			<tr>
			<td colspan="7"><strong>PROMEDIO DE APROVECHAMIENTO</strong></td>
				<td align="center"><div class="form-group">
				<?php 
					$avg_aprovechamiento=$suma/count($buscar3);
				$avg_aprovechamiento=number_format($avg_aprovechamiento,2,".",","); ?>

				{{ $avg_aprovechamiento }}
				</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="7"><strong>PROMEDIO DE COMPORTAMIENTO</strong></td>
				<td colspan="2"><div class="form-group">{{ $buscar4->comportamiento->literal }}
				</div></td>
			</tr>
			<tr>
				<td colspan="2"><strong>OBSERVACIONES</strong></td>
				<td colspan="7">
					<div class="form-group">
						{{ $buscar4->observaciones }}
					</div>
				</td>
			<tr>
			<tr>
				
				<td colspan="9"><strong>FALTAS</strong></td>
				
			</tr>
			<tr>
				
				<td> <strong>JUSTIFICADAS</strong> </td>
				<td>{{ $buscar4->faltas_j }} </td>
				<td colspan="7"></td>
			</tr>
			<tr>
				
				<td> <strong>INJUSTIFICADAS</strong> </td>
				<td>{{ $buscar4->faltas_i }} </td>
				<td colspan="7"></td>
			</tr>

			<tr>
				
				<td> <strong>ATRASOS JUSTIFICADOS</strong> </td>
				<td>{{ $buscar4->atrasos_j }} </td>
				<td colspan="7"></td>
			</tr>

			<tr>
				
				<td> <strong>ATRASOS INJUSTIFICADOS</strong> </td>
				<td>{{ $buscar4->atrasos_j }} </td>
				<td colspan="7"></td>
			</tr>
			
		</tbody>


	</table>


