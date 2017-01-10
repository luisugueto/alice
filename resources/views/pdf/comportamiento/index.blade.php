<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="estado.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div align="center">
	<h3>ESCUELA DE EDUCACIÓN BÁSICA PARTÍCULAR</h3><br>
	<img src="img/logo.jpg" alt="" width="200px" style="margin-top: -30px"><br>
	<h4 style="margin-top:-10px">Dirección: Vía Daule Km. 8 1/2 Florida Norte Mz. 385 SL 18<br>
	Coop. Unidos Somos Más<br>
	Teléfono: 2260439</h4>
</div>
<div align="right">
	<b>Guayaquil, <?php date_default_timezone_set('America/Guayaquil'); //puedes cambiar Guayaquil por tu Ciudad
setlocale(LC_TIME, 'spanish');
echo $fecha=strftime("%d de %B de %Y"); ?></b>
</div>
<div align="center">
	<h1>CERTIFICADO DE COMPORTAMIENTO</h1>
</div>

<div align="justify">

	<p>Por medio de la Presente la Secretaría de la Escuela de Educación Básica Particular 
	MARÍA MONTESSORI, certifica que el(a) estudiante:<br> <br>
	<div align="center">
		<b><h2>{{ strtoupper($nombre) }} {{ strtoupper($apellido) }}</h2></b>
	</div><br><br>
	Se matriculó en el <b>{{ $curso }} grado de Educación General Básica</b> obteniendo un comportamiento 
	equivalente a <b>SATISFACTORIO</b>.<br><br>Así consta en los archivos de la Secretaría del Plantel, a los que me remito en caso necesario</p>
	
	<br><br><br>

	<p align="left">Es todo cuanto puedo certificar en honor a la verdad.	<br>
	Atte.<br><br>
	________________________<br><br><br>Tnlg. Viviana Peralta<br>Secretaria General</p>
</div>
</body>
</html>