<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="estado.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="border: 3px solid black; border-radius: 5px">
<div align="center">
	<h2><u>RECIBO DE PAGO</u></h2>
</div>
<div style="margin-top: -30px">

	<table>
		<tr>
			<td style="width: 200px"><img src="img/logo.jpg" alt="" width="150px" height="100px"></td>
			<td style="width: 350px; text-align: center"><b>MARÍA MONTESSORI</b><br>Dirección: Vía Daule Km. 8 1/2 <br>Florida Norte Mz. 385 SL 18</td>
			<td style="width: 150px; text-ali	gn: right"><b>Fecha:</b> <?php echo date('d-m-Y'); ?></td>
		</tr>
	</table>

</div>

<div align="center">
<hr>
	<table>
		<tr>
			<td style="width: 250px"><b style="margin-left: 0px">&nbsp;Nombre del Trabajador: </b><br>&nbsp;{{ strtoupper($nombres) }} {{ strtoupper($apellido) }}</td>
			<td style="width: 250px"><b style="margin-left: 0px">&nbsp;Cédula:</b> <br>&nbsp;2437742152</td>
			<td style="width: 250px"><b style="margin-left: 0px">&nbsp;Cargo:</b> <br>&nbsp;Programador</td>
		</tr>
		<tr>
			<td colspan="2" style="border-right: 0px">&nbsp;<b style="margin-left: 0px">Período:</b> {{ $firstDay }} al {{ $lastDay }}</td>
			<td><b style="margin-left: 0px">Total a Pagar:</b> ${{ $pagosTotal }}</td>
		</tr>
	</table>
	<hr>
	<table style="margin-left: 10px; margin-right: 10px">
		<tr>
			<td style="width: 300px">CONCEPTO</td>
			<td style="width: 300px">CANTIDAD</td>
			<td style="width: 200px">TOTAL</td>
		</tr>
		<tr>
			<td>Capital</td>
			<td>1</td>
			<td>{{ $capital }}</td>
		</tr>
		<tr>
			<td>Prestamos</td>
			<td>{{ $contadorPrestamos }}</td>
			<td>{{ $prestamos }}</td>
		</tr>
		<tr>
			<td>Retardos en Asistencia</td>
			@if($minutosRetardo == '')
				<td>0</td>
			@else
				<td>{{ $minutosRetardo }} </td>
			@endif
			<td>{{ $retardo }}</td>
		</tr>
	</table>
	<br><br><br><br>
	Firma y Sello<br><br>
	________________________<br><br>
</div>
</body>
</html>
