<!DOCTYPE html>
<html>
<head>
	<title>{{ $estudiante->nombres}}, {{ $estudiante->apellidos }} </title>
	<link rel="stylesheet" type="text/css" href="estado.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style type="text/css">

		table {     
    		border-collapse: collapse; 
    	}

    </style>
</head>
</head>
<body>
	<div style="padding-top: 50px; padding-left: 85px; position:absolute;">
		<img src="img/logo.jpg" alt="" width="200px" style="margin-top: -30px">
	</div>
	<div align="center" style="padding-top: -10px;">
		<h3>ESCUELA DE EDUCACIÓN BÁSICA PARTICULAR</h3>
		<h4 style="padding-top: -20px;">"MARÍA MONTESSORI"</h4>
		<h4 style="padding-top:-15px">Dirección: Vía Daule Km. 8 1/2 Florida Norte Mz. 385 SL 18<br>
		Coop. Unidos Somos Más<br>
		Teléfono: 2260439</h4>
	</div>

	<table style="width: 100%; padding-top: 10%;">
		<thead>
			<tr>
				<th style="width: 50%; background-color: black;"></th>
				<th>FACTURA</th>
				<th style="width: 50%; background-color: black;"></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td style="padding-top: 20px; padding-left: 50px;">FECHA: {{ $facturacion->fecha }}</td>
				<td></td>
				<td style="padding-top: 20px; padding-left: 50px;">ESTUDIANTE: {{ $estudiante->nombres }}</td>
			</tr>
			<tr>
				<td style="padding-left: 50px;">FACTURA NÚMERO: {{ $facturacion->numero }}</td>
				<td></td>
				<td style="padding-left: 50px;">MATRÍCULA: {{ $estudiante->codigo_matricula }}</td>
			</tr>
			<tr>
				<td style="padding-left: 50px;">CLIENTE: {{ $estudiante->representante->nombres_re }}</td>
				<td></td>
				<td style="padding-left: 50px;">CURSO: {{ strtoupper($curso->curso) }}</td>
			</tr>
			<tr>
				<td style="padding-left: 50px;">TELÉFONO: {{ $estudiante->representante->telefono_re }}</td>
				<td></td>
				<td></td>
			</tr>
		</tbody>
		<thead>
			<tr>
				<th colspan="3"><br></th>
			</tr>
			<tr>
				<th colspan="3" style="width: 100%; background-color: black; padding-top: 20px;"></th>
			</tr>
		</thead>
	</table>
	<?php $i = 0; ?>
	<table style="width: 100%; padding-top: 10%;" border="1">
		<thead>
			<tr>
				<th>CANT. RUBROS</th>
				<th>MONTO PAGADO</th>
				<th>FECHA</th>
				<th>MODALIDAD</th>
				<th>TRANSFERENCIA</th>
				<th>CHEQUE</th>
			</tr>
		</thead>
		<tbody>
			@foreach($rubros as $key => $rubro)
				<tr>
					@if($i == 0)
					<td rowspan="{{ count($rubro->realizados)+2 }}" style="text-align: center;">{{ count($rubros) }}</td>
					@endif
					<td colspan="5"></td>
					@foreach($rubro->realizados as $rubrosRealizados)
					<tr>
						<td style="text-align: center;">{{ $rubrosRealizados->monto_pagado }} $</td>
						<td style="text-align: center;">{{ $rubrosRealizados->fecha }}
						<td style="text-align: center;">{{ strtoupper($rubrosRealizados->modalidad->modalidad) }} </td>
						@if($rubrosRealizados->no_transferencia != 0)
						<td style="text-align: center;">{{ $rubrosRealizados->no_transferencia }}</td>
						@else
						<td style="text-align: center;">NO</td>
						@endif
						@if($rubrosRealizados->no_cheque != 0)
						<td style="text-align: center;">{{ $rubrosRealizados->no_transferencia }}</td>
						@else
						<td style="text-align: center;">NO</td>
						@endif
					</tr>	
					@endforeach
				</tr>
				<?php $i++; ?>
			@endforeach
		</tbody>
	</table>

	<table style="width: 100%; padding-top: 20px;" border="1">
		<thead>
			<tr>
				<th>RUBROS</th>
				<th>FECHA MAX. DE PAGO</th>
				<th>TOTAL</th>
			</tr>
		</thead>
		<tbody>
			@foreach($rubros as $rubroNuevo)
				<tr>
					<td>{{ $rubroNuevo->rubro->nombre }}</td>
					<td style="text-align: center;">{{ $rubroNuevo->rubro->fecha }}</td>
					<td style="text-align: center;">{{ $facturacion->total_pago }}</td>
				</tr>
			@endforeach
				
		</tbody>
	</table>
</body>
</html>