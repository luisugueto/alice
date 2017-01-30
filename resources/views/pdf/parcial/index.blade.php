<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ strtoupper($estudiantes->apellido_paterno." ".$estudiantes->apellido_materno.", ".$estudiantes->nombres) }}</title>
    <style type="text/css">

		.texto-vertical-2 {
	    	-webkit-transform: rotate(-90deg);
  			-moz-transform: rotate(-90deg);
  			-ms-transform: rotate(-90deg);
  			-o-transform: rotate(-90deg);
  			transform: rotate(-90deg);
  			position: relative;

		}

		table {     
    		border-collapse: collapse; 
    	}

    </style>
</head>
<body>
	<div align="center" style="padding-top: -10px;">
		<h3>ESCUELA DE EDUCACIÓN BÁSICA PARTICULAR</h3>
		<h4 style="padding-top: -20px;">MARIA MONTESSORI</h4>
	</div>

	<div style="padding-left: 60px; padding-top: -30px;">
		<h5>LIBRETA DE CALIFICACIONES CORRESPONDIENTES AL</h5>
		<h5 style="color: #1E90FF; padding-top: -20px;">{{ pdf($estudiantes->id) }} AÑO LECTIVO: {{ periodo($periodo->id) }}</h5>
		<h5 style="padding-top: -20px;"><strong>NOMBRE:</strong>  {{ strtoupper($estudiantes->apellido_paterno." ".$estudiantes->apellido_materno.", ".$estudiantes->nombres) }}</h5>
	</div>

	<?php
		$color=['#32CD32','#F5F5DC','#1E90FF','#FF69B4','#FF4500'];
		$faltas=['FALTAS JUSTIFICADAS','FALTAS INJUSTIFICADAS','ATRASOS JUSTIFICADOS','ATRASOS INJUSTIFICADOS'];
		$i=1;
		$j=0; 
	?>

	<table border="1px">
		<thead>
			<tr>
				<th>#</th>
				<th>ASIGNATURA</th>
				@foreach($categorias as $categ)
					<th style="width: 10px;height: 150px;" align="center" bgcolor="<?=$color[$j]?>" >
						<div class="texto-vertical-2" style=""> 
							{{ strtoupper($categ->categoria) }}
						</div>
					</th>
					<?php $j++; ?>
				@endforeach
					<th align="center" bgcolor="#FFD700"><div class="texto-vertical-2" >PROMEDIO TOTAL</div></th>
					<th align="center" bgcolor="#F0F8FF"><div class="texto-vertical-2" >CUALITATIVA</div></th>
			</tr>
		</thead>
		<tbody>	
										
			@foreach($docentes as $doce)

				<?php $id_asig=$doce->id_asignatura; ?>
										
				@foreach($asignaturas as $asig)
										
					@if($id_asig==$asig->id)
				 		<tr align="center">

							<td>{{ $i }}</td>
							<td style="width: 200px;">{{ $asig->asignatura }}</td>
										
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
									<?php $avg_aprovechamiento=$suma/count($buscar3); $avg_aprovechamiento=number_format($avg_aprovechamiento,2,".",","); ?>
									{{ $avg_aprovechamiento }}
								</td>
								<td>&nbsp;</td>
							</tr>
							<tr>
								<td colspan="7"><strong>PROMEDIO DE COMPORTAMIENTO</strong></td>
								<td colspan="2" align="center"><div class="form-group">{{ $buscar4->comportamiento->literal }}</div>
								</td>
							</tr>
							<tr>
								<td colspan="2"><strong>OBSERVACIONES</strong></td>
								<td colspan="7">
									<div class="form-group">
										{{ $buscar4->observaciones }}
									</div>
								</td>
							</tr>
							<tr>	
								<th colspan="6" align="left"><span style="color: #1E90FF;">EQUIVALENCIA DE CALIFICACIÓN</span></th>
								<th colspan="3">FALTAS</th>
							</tr>
							<tr>
								<td colspan="5"><span style="color: #1E90FF;">DAR -</span> DOMINA APRENDIZAJE REQUERIDO</td>			
								<td>9 - 10</td>
								<td colspan="2"> <strong>JUSTIFICADAS</strong> </td>
								<td align="center">{{ $buscar4->faltas_j }} </td>
							</tr>
							<tr>
								<td colspan="5"><span style="color: #1E90FF;">AAR -</span> ALCANZA APRENDIZAJE REQUERIDO</td>			
								<td>7 - 8,99</td>
								<td colspan="2"> <strong>INJUSTIFICADAS</strong> </td>
								<td align="center">{{ $buscar4->faltas_i }} </td>
							</tr>
							<tr>
								<td colspan="5"><span style="color: #1E90FF;">PAAR -</span> PROX. ALCANZAR APRENDIZAJE REQUERIDO</td>			
								<td>5 - 6,99</td>
								<td colspan="2"> <strong>ATRASOS JUSTIFICADOS</strong> </td>
								<td align="center">{{ $buscar4->atrasos_j }} </td>
							</tr>
							<tr>
								<td colspan="5"><span style="color: #1E90FF;">NAAR -</span> NO ALCANZA APRENDIZAJE REQUERIDO</td>			
								<td>1 - 4</td>
								<td colspan="2"> <strong>ATRASOS INJUSTIFICADOS</strong> </td>
								<td align="center">{{ $buscar4->atrasos_j }} </td>
							</tr>
						</tbody>
					</table>
		<div align="center" style="padding-top: 40px;">
			_________________________________
			<br>
			<strong>FIRMA DEL TUTOR DE GRADO</strong>
		</div>
</body>
</html>
