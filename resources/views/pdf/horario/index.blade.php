<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sistema María Montessori</title>
    <meta name="description" content="">
    <style>
        <?php

        include(public_path().'/css/bootstrap.min.css');
        include(public_path().'/bootstrap/dist/css/bootstrap.min.css');
        include(public_path().'/css/AdminLTE.css');

        ?>
    </style>

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
    <div class="row" style="padding-top: 25px;">
        <div class="col-xs-12">

            <div class="col-sm-12">
                    <div class="box-body">
                        <div class="table-responsive">
                            <div class="col-md-12">
                                <div class="col-md-14">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                        <tr class="bg-light-blue color-palette">
                                            <th>CURSO</th>
                                            <th>SECCIÓN</th>
                                            <th>CAPACIDAD</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>{{ $curso->curso }}</td>
                                            <td>{{ $seccion->literal }}</td>
                                            <td>{{ $seccion->capacidad }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="box-body no-padding">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th colspan="7" class="text-center bg-gray disabled color-palette"> DÍAS</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center bg-light-blue color-palette" colspan="2"> HORA </th>
                                            @foreach($dias as $dia)
                                                <th class="text-center bg-light-blue color-palette"> {{ $dia->dia }}</th>
                                            @endforeach
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @for($i = 0; $i < 9; $i++)
                                            @if($i == 4)
                                                <tr>
                                                    <th class="text-center bg-gray disabled color-palette" colspan="7"> RECREO </th>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td colspan="2" class="text-center" style="width: 150px;"> {{ $horas[$i]->bloque }} </td>

                                                    @for($j=0; $j < 5; $j++)

                                                        @if($i == 0)
                                                            <th class="text-center"> SALUDO</th>
                                                        @else
                                                            <td class="text-center text-light-blue">
                                                                @if(asignados($bloques2[$i][$j]->id,$bloques_asignados))
                                                                    {{ asignaturas_a($bloques2[$i][$j]->id,$asignaturas_asignadas,$seccion->id) }}
                                                                    {{ aulas($bloques2[$i][$j]->id, $aulas, $seccion->id) }}
                                                                @endif
                                                            </td>
                                                        @endif

                                                    @endfor
                                                </tr>
                                            @endif
                                        @endfor
                                        </tbody>
                                    </table>
                                    <div class="row" style="padding-top: 25px;">
                                        <div class="col-md-6">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                <tr class="bg-light-blue color-palette">
                                                    <th>ASIGNATURA</th>
                                                    <th>CÓDIGO</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($asignaturas as $asignatura)
                                                    <tr>
                                                        <td>{{ $asignatura->asignatura }}</td>
                                                        <td>{{ $asignatura->codigo }}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>

</body>
</html>
