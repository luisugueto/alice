@extends('welcome')

@section('contentheader_title', 'Tablero')
@section('contentheader_description', 'Inicio')

@section('main-content')

    @if(Auth::user()->roles_id == 1)

        <div class="span12" id="content">

            <div class="row-fluid">
                <div class="span4">
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">DATOS DE USUARIO ACTUAL</div>
                        </div>
                        <div class="block-content collapse in">
                            <li>{{ strtoupper(Auth::user()->name) }}</li>
                            <li>{{ strtoupper(Auth::user()->roles->nombre) }}</li>
                        </div>
                    </div>

                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">ESTADÍSTICA ANUAL DE POBLACIÓN</div>
                        </div>
                        <div class="block-content collapse in">
                            TOTAL DE CAPACIDAD <span class="badge badge-info pull-right"> {{ $suma-$activos  }} </span>
                            <div class="progress progress-striped active">
                                <div style="width: {{ ($activos/$suma)*100  }}%;" class="bar"></div>
                            </div>
                            MATRICULADOS ACTIVOS <span class="badge badge-success pull-right"> {{ $activos }} </span>
                            <div class="progress progress-striped progress-success active">
                                <div style="width: {{ ($activos/$suma)*100  }}%;" class="bar"></div>
                            </div>
                            MATRICULADOS DESERTADOS <span class="badge badge-warning pull-right"> {{ $suma-$activos }} </span>
                            <div class="progress progress-striped progress-warning active">
                                <div style="width: {{ (($suma-$activos)/$suma)*100 }}%;" class="bar"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="span5">
                    <!-- block -->
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">TAREAS COMUNES (ACCESO RÁPIDO)</div>
                        </div>
                        <div class="block-content collapse in">
                            <li><a href="{{ route('docentes.index') }}">LISTADO DE DOCENTES</a></li>
                            <li><a href="{{ route('personal.index') }}">LISTADO DEL PERSONAL</a></li>
                            <li><a href="{{ route('estudiantes.index') }}">LISTADO DE ESTUDIANTES</a></li>
                            <li><a href="{{ url('personal/control_de_pagos') }}">CONTROL DE PAGOS MENSUAL</a></li>
                            <li><a href="{{ url('personal/control_de_pagos') }}">CALCULO DE RETARDO</a></li>
                            <li><a href="{{ url('facturaciones') }}">LISTADO TOTAL DE FACTURACIONES</a></li>
                            <li><a href="#">LISTADO DEL MES ACTUAL DE FACTURACIONES</a></li>
                            <li><a href="{{ url('verificarPrestamos') }}">VERIFICAR PRÉSTAMO</a></li>
                            <li><a href="{{ url('/prestamosTotal') }}">LISTADO TOTAL DE PRESTAMOS</a></li>
                            <li><a href="{{ route('prestamos.index') }}">LISTADO TOTAL DE PRESTAMOS DEL MES ACTUAL</a></li>
                        </div>
                    </div>
                </div>
                <div class="span3">
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">DATOS DE INSTITUCIÓN</div>
                        </div>
                        <div class="block-content collapse in">
                            <span class="help-inline" for="inputError" style="color:red;">PERIODO LECTIVO {{ Session::get('periodoNombre') }}</span>
                        </div>
                    </div>
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">ATAJOS DE TECLADO</div>
                        </div>
                        <div class="block-content collapse in">
                            <li>PRESTAMOS (SHIFT+P)</li>
                            <li>INSCRIPCIONES (CONTROL+M)</li>
                            <li>ESTUDIANTES (SHIFT+L)</li>
                            <li>PERSONAL (CONTROL+C)</li>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        @elseif(Auth::user()->roles_id == 3)
            <div class="span12" id="content">

                <div class="row-fluid">
                    <div class="span4">
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">ATAJOS DE TECLADO</div>
                            </div>
                            <div class="block-content collapse in">
                                <li>PARCIALES (SHIFT+K)</li>
                                <li>MOSTRAR CALIFICACIONES PARCIALES (CONTROL+B)</li>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    @endif

   <!--
    function calcular_tiempo_trasnc($hora1,$hora2){
        $separar[1]=explode(':',$hora1);
        $separar[2]=explode(':',$hora2);

        $total_minutos_trasncurridos[1] = ($separar[1][0]*60)+$separar[1][1];
        $total_minutos_trasncurridos[2] = ($separar[2][0]*60)+$separar[2][1];
        $total_minutos_trasncurridos = $total_minutos_trasncurridos[1]-$total_minutos_trasncurridos[2];
        if($total_minutos_trasncurridos<=59) return($total_minutos_trasncurridos.' Minutos');
        elseif($total_minutos_trasncurridos>59){
            $HORA_TRANSCURRIDA = round($total_minutos_trasncurridos/60);
            if($HORA_TRANSCURRIDA<=9) $HORA_TRANSCURRIDA='0'.$HORA_TRANSCURRIDA;
            $MINUITOS_TRANSCURRIDOS = $total_minutos_trasncurridos%60;
            if($MINUITOS_TRANSCURRIDOS<=9) $MINUITOS_TRANSCURRIDOS='0'.$MINUITOS_TRANSCURRIDOS;
            return ($HORA_TRANSCURRIDA.':'.$MINUITOS_TRANSCURRIDOS.' Horas');

        } }
    //llamamos la función e imprimimos
    echo calcular_tiempo_trasnc('13:00', '06:30');
    -->
@endsection

@section('scripts')
    <script>
        $(document).hotkey('shift+p', function() {
            window.location.href = '/prestamos/create';
        });
        $(document).hotkey('ctrl+m', function() {
            window.location.href = '/inscripciones';
        });
        $(document).hotkey('shift+l', function() {
            window.location.href = '/estudiantes';
        });
        $(document).hotkey('ctrl+c', function() {
            window.location.href = '/personal';
        });

        @if(Auth::user()->roles_id == 3)
            $(document).hotkey('shift+k', function() {
                window.location.href = '/parciales/1';
            });
            $(document).hotkey('ctrl+b', function() {
                window.location.href = '/parciales/mostrarcalificaciones';
            });
        @endif
    </script>
@endsection