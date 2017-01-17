<div class="navbar-inner">
    <div class="container-fluid">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <a class="brand" href="#"><i>Montessorí</i></a>
        <div class="nav-collapse collapse">
            <ul class="nav pull-right">
                <li class="dropdown">
                    <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"><i class="caret"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a tabindex="-1" href="{{ route('user_perfil.index') }}">Perfil</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a tabindex="-1" href="{{ url('/salir') }}">Salir</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav">
                <li class="active">
                    <a href="{{ url('/home') }}">Inicio</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Certificados <i class="caret"></i>

                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a tabindex="-1" href="{{ url('certificados/listado_estudiantes_inscritos') }}">Matrícula</a>
                        </li>
                        <li>
                            <a tabindex="-1" href="{{ url('certificados/listado_personal') }}">Laboral</a>
                        </li>
                        <li>
                            <a tabindex="-1" href="{{ url('certificados/listado_estudiantes_comportamiento') }}">Comportamiento</a>
                        </li>
                    </ul>
                </li>
                @if(Auth::user()->roles_id == 4 || Auth::user()->roles_id == 2 || Auth::user()->roles_id == 1)
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Personal <b class="caret"></b>

                        </a>
                        <ul class="dropdown-menu" id="menu1">
                            <li>
                                <a href="{{ route('asistencias.index') }}">Asistencia</a>
                            </li>
                            <li>
                                <a href="{{ route('docentes.index') }}">Docentes</a>
                            </li>
                            <li>
                                <a href="{{ url('personal/control_de_pagos') }}">Pagos</a>
                            </li>
                            <li>
                                <a href="{{ route('personal.index') }}">Personal</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{ url('/prestamosTotal') }}">Préstamos</a>

                            </li>
                            <li><a href="{{ url('verificarPrestamos') }}">Verificar Préstamo</a></li>
                        </ul>
                    </li>
                @endif
                @if(Auth::user()->roles_id == 5 || Auth::user()->roles_id == 2 || Auth::user()->roles_id == 1)
                    <li class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Estudiantes <i class="caret"></i>

                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a tabindex="-1" href="{{ route('estudiantes.index') }}">Estudiantes</a>
                            </li>
                            <li>
                                <a tabindex="-1" href="{{ route('inscripciones.index') }}">Inscripción</a>
                            </li>
                            <li>
                                <a tabindex="-1" href="{{ route('inscripciones.show',[0]) }}">Inscritos</a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if(Auth::user()->roles_id == 4 || Auth::user()->roles_id == 2 || Auth::user()->roles_id == 1)
                    <li class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Facturaciones <i class="caret"></i>

                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a tabindex="-1" href="{{ url('facturaciones/buscar/estudiante') }}">Facturación</a>
                            </li>
                            <li>
                                <a tabindex="-1" href="{{ url('facturaciones') }}">Facturaciones</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a tabindex="-1" href="{{ url('morosos') }}">Morosos</a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if(Auth::user()->roles_id == 5 || Auth::user()->roles_id == 3 || Auth::user()->roles_id == 1)
                    <li class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Parciales <i class="caret"></i>

                        </a>
                        <ul class="dropdown-menu">
                            @if(Auth::user()->roles_id == 1)
                                <li>
                                    <a tabindex="-1" href="{{ route('parciales.show',1) }}">Estudiantes</a>
                                </li>
                            @endif
                            <?php $tipo=tipo_docente(); ?>
                            @if($tipo=="DOCENTE ROTATIVO")
                                <li>
                                    <a tabindex="-1" href="{{ route('parciales.asignaturas') }}">Asignaturas</a>
                                </li>
                            @endif
                            @if(Auth::user()->roles_id == 3)
                                <li>
                                    <a tabindex="-1" href="{{ route('parciales.index') }}">Estudiantes</a>
                                </li>
                                <li>
                                    <a tabindex="-1" href="{{ route('parciales.mostrarcalificaciones') }}">Calificaciones</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if(Auth::user()->roles_id == 5 || Auth::user()->roles_id == 1)
                    <li class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Quimestres <i class="caret"></i>

                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a tabindex="-1" href="{{ route('quimestres.create') }}">Quimestre</a>
                            </li>
                            <li>
                                <a tabindex="-1" href="{{ route('quimestres.index') }}">Quimestres</a>
                            </li>
                        </ul>
                    </li>
                @endif
                <li class="dropdown">
                    <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Horarios <i class="caret"></i>

                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a tabindex="-1" href="{{ route('horarios.index') }}">Horarios</a>
                        </li>
                    </ul>
                </li>
                @if(Auth::user()->roles_id == 5 || Auth::user()->roles_id == 4 || Auth::user()->roles_id == 2 || Auth::user()->roles_id == 1)
                    <li class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Configuración <i class="caret"></i>

                        </a>
                        <ul class="dropdown-menu">
                            @if(Auth::user()->roles_id == 5 || Auth::user()->roles_id == 2 || Auth::user()->roles_id == 1)
                                <li>
                                    <a tabindex="-1" href="{{ route('aulas.index') }}">Aulas</a>
                                </li>
                            @endif
                            @if(Auth::user()->roles_id == 4 || Auth::user()->roles_id == 1)
                                <li>
                                    <a tabindex="-1" href="{{ route('areas.index') }}">Areas</a>
                                </li>
                            @endif
                            @if(Auth::user()->roles_id == 5 || Auth::user()->roles_id == 1)
                                <li>
                                    <a tabindex="-1" href="{{ route('asignaturas.index') }}">Asignaturas</a>
                                </li>
                            @endif

                            @if(Auth::user()->roles_id == 4)
                                <li>
                                    <a tabindex="-1" href="{{ route('iess.index') }}">IESS</a>
                                </li>
                            @endif
                            @if(Auth::user()->roles_id == 5 || Auth::user()->roles_id == 2 || Auth::user()->roles_id == 1 )
                                <li>
                                    <a tabindex="-1" href="{{ route('cargos.index') }}">Cargos</a>
                                </li>
                            @endif
                            @if(Auth::user()->roles_id == 5 || Auth::user()->roles_id == 1)
                                <li>
                                    <a tabindex="-1" href="{{ route('rubros.index') }}">Rubros</a>
                                </li>
                            @endif
                            @if(Auth::user()->roles_id == 4 || Auth::user()->roles_id == 2 || Auth::user()->roles_id == 1)
                                <li>
                                    <a tabindex="-1" href="{{ route('secciones.index') }}">Secciones</a>
                                </li>
                            @endif

                            @if(Auth::user()->roles_id == 4 || Auth::user()->roles_id == 1)
                                <li>
                                    <a tabindex="-1" href="{{ route('usuarios.index') }}">Usuarios</a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a tabindex="-1" href="{{ route('tipo_empleado.index') }}">Tipo Empleado</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</div>