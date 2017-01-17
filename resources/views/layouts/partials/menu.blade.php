<?php
use App\Http\helpers;
?>
            @if(Auth::user()->roles_id == 4 || Auth::user()->roles_id == 2 || Auth::user()->roles_id == 1)	
                <li  class="dropdown" id="personal" ><a title="" href="#" data-toggle="dropdown" data-target="#personal" class="dropdown-toggle"><i class="fa fa-male"></i>  <span class="text">Personal</span><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('docentes.index') }}">Listado de Docentes</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ route('personal.index') }}">Listado del Personal</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ route('asistencias.index') }}">Asistencia del Personal</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ url('personal/control_de_pagos') }}">Control del Pagos Mensual</a></li>
                    </ul>
                </li>
            @endif
            @if(Auth::user()->roles_id == 5 || Auth::user()->roles_id == 2 || Auth::user()->roles_id == 1)
            <li  class="dropdown" id="estudiantes" ><a title="" href="#" data-toggle="dropdown" data-target="#estudiantes" class="dropdown-toggle"><i class="fa fa-child"></i>  <span class="text">Estudiantes</span><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    <li><a href="{{ route('representantes.cedula') }}">Nuevo</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('estudiantes.index') }}">Listado</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('inscripciones.show',[0]) }}">Inscritos</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('inscripciones.index') }}">Realizar Inscripción</a></li>
                </ul>
            </li>
            @endif
            @if(Auth::user()->roles_id == 4 || Auth::user()->roles_id == 2 || Auth::user()->roles_id == 1)
            <li  class="dropdown" id="facturaciones" ><a title="" href="#" data-toggle="dropdown" data-target="#facturaciones" class="dropdown-toggle"><i class="fa fa-money"></i>  <span class="text">Facturaciones</span><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    <li><a href="{{ url('facturaciones/buscar/estudiante') }}">Nuevo</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ url('facturaciones') }}">Listado Total</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Listado del Mes Actual</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ url('morosos') }}">Morosos</a></li>
                </ul>
            </li>
            @endif 
            @if(Auth::user()->roles_id == 4 || Auth::user()->roles_id == 2 || Auth::user()->roles_id == 1)
            <li  class="dropdown" id="prestamos" ><a title="" href="#" data-toggle="dropdown" data-target="#prestamos" class="dropdown-toggle"><i class="fa fa-money"></i>  <span class="text">Préstamos y Anticipos</span><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    <li><a href="{{ route('prestamos.create') }}">Nuevo</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ url('verificarPrestamos') }}">Verificar Préstamo</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ url('/prestamosTotal') }}">Listado Total</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('prestamos.index') }}">Listado del Mes Actual</a></li>
                </ul>
            </li>
            @endif
            @if(Auth::user()->roles_id == 5 || Auth::user()->roles_id == 2 || Auth::user()->roles_id == 1)
            <li  class="dropdown" id="horarios" ><a title="" href="#" data-toggle="dropdown" data-target="#horarios" class="dropdown-toggle"><i class="fa fa-calendar"></i>  <span class="text">Horarios</span><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    <li><a href="{{ route('horarios.index') }}">Nuevo</a></li>
                </ul>
            </li>
            @endif
             @if(Auth::user()->roles_id == 5 || Auth::user()->roles_id == 2 || Auth::user()->roles_id == 1)
            <li  class="dropdown" id="parciales" ><a title="" href="#" data-toggle="dropdown" data-target="#parciales" class="dropdown-toggle"><i class="fa fa-list-alt"></i>  <span class="text">Parciales</span><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    @if(Auth::user()->roles_id == 1)
                        <li><a href="{{ route('parciales.show',1) }}">Todos los Estudiantes</a></li>
                    @endif
                    <?php $tipo=tipo_docente(); ?>
                    @if($tipo=="DOCENTE ROTATIVO")
                    <li class="divider"></li>
                        <li><a href="{{ route('parciales.asignaturas') }}">Asignaturas Asignadas</a></li>
                    @endif
                    @if(Auth::user()->roles_id == 3)
                        <li class="divider"></li>
                        <li><a href="{{ route('parciales.index') }}">Lista de Mis Estudiantes</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ route('parciales.mostrarcalificaciones') }}"  >Calificaciones Cargadas</a></li>
                    @endif
                </ul>
            </li>
            @endif
            @if(Auth::user()->roles_id == 5 || Auth::user()->roles_id == 1)
             <li  class="dropdown" id="quimestres" ><a title="" href="#" data-toggle="dropdown" data-target="#quimestres" class="dropdown-toggle"><i class="fa fa-calendar-o"></i>  <span class="text">Quimestres</span><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    <li><a href="{{ route('quimestres.index') }}">Listado</a></li>
                        <li class="divider"></li>
                    <li><a href="{{ route('quimestres.create') }}">Nuevo</a></li>
                </ul>
            </li>
            @endif

            @if(Auth::user()->roles_id == 5 || Auth::user()->roles_id == 4 || Auth::user()->roles_id == 2 || Auth::user()->roles_id == 1)
            <li  class="dropdown" id="certificados" ><a title="" href="#" data-toggle="dropdown" data-target="#certificados" class="dropdown-toggle"><i class="fa fa-file-archive-o"></i>  <span class="text">Certificados</span><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    @if(Auth::user()->roles_id == 5 || Auth::user()->roles_id == 2 || Auth::user()->roles_id == 1)
                    <li><a href="{{ url('certificados/listado_estudiantes_inscritos') }}">Matrícula</a></li>
                    <li><a href="{{ url('certificados/listado_personal') }}">Laboral</a></li>
                    <li><a href="{{ url('certificados/listado_estudiantes_comportamiento') }}">Comportamiento</a></li>
                    @endif
                  
                </ul>
            </li>
            @endif
            @if(Auth::user()->roles_id == 5 || Auth::user()->roles_id == 4 || Auth::user()->roles_id == 2 || Auth::user()->roles_id == 1)
            <li  class="dropdown" id="configuracion" ><a title="" href="#" data-toggle="dropdown" data-target="#configuracion" class="dropdown-toggle"><i class="fa fa-link"></i>  <span class="text">Configuración</span><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                    @if(Auth::user()->roles_id == 4)
                    <li class="divider"></li>
                    <li><a href="{{ route('iess.index') }}">IESS</a></li>
                    @endif
                    @if(Auth::user()->roles_id == 4 || Auth::user()->roles_id == 2 || Auth::user()->roles_id == 1)
                    <li class="divider"></li>
                    <li><a href="{{ route('secciones.index') }}">Secciones</a></li>
                    @endif
                    @if(Auth::user()->roles_id == 5 || Auth::user()->roles_id == 2 || Auth::user()->roles_id == 1)
                    <li class="divider"></li>
                    <li><a href="{{ route('aulas.index') }}">Aulas</a></li>
                    @endif
                    @if(Auth::user()->roles_id == 5 || Auth::user()->roles_id == 2 || Auth::user()->roles_id == 1 )
                    <li class="divider"></li>
                    <li><a href="{{ route('cargos.index') }}">Cargos</a></li>
                    @endif
                    @if(Auth::user()->roles_id == 4 || Auth::user()->roles_id == 1)
                    <li class="divider"></li>
                    <li><a href="{{ route('areas.index') }}">Areas</a></li>
                    @endif
                    @if(Auth::user()->roles_id == 5 || Auth::user()->roles_id == 1)
                    <li class="divider"></li>
                    <li><a href="{{ route('asignaturas.index') }}">Asignaturas</a></li>
                    @endif
                    @if(Auth::user()->roles_id == 5 || Auth::user()->roles_id == 1)
                    <li class="divider"></li>
                    <li><a href="{{ route('rubros.index') }}">Rubros</a></li>
                    @endif
                     @if(Auth::user()->roles_id == 4 || Auth::user()->roles_id == 1)
                     <li class="divider"></li>
                    <li><a href="{{ route('usuarios.index') }}"> Usuarios</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('tipo_empleado.index') }}">Tipo de Empleado</a></li>
                    @endif
                </ul>
            </li>
            @endif


