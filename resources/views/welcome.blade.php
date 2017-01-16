<!DOCTYPE html>
<html class="no-js">

<head>
    <title>Sistema Administrativo y Académico María Montessori</title>
    <!-- Bootstrap -->
    <link href="{{ asset('Bootstrap-Admin-Theme-master/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('Bootstrap-Admin-Theme-master/bootstrap/css/bootstrap-responsive.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('Bootstrap-Admin-Theme-master/vendors/easypiechart/jquery.easy-pie-chart.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('Bootstrap-Admin-Theme-master/assets/styles.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('Bootstrap-Admin-Theme-master/vendors/datatables/css/jquery.dataTables.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('Bootstrap-Admin-Theme-master/assets/DT_bootstrap.css') }}" rel="stylesheet" media="screen">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="{{ asset('Bootstrap-Admin-Theme-mastervendors/modernizr-2.6.2-respond-1.1.0.min.js') }}"></script>
</head>

<body>
<div class="navbar navbar-fixed-top">
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
                        <a href="#">Inicio</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Certificados <i class="caret"></i>

                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a tabindex="-1" href="{{ url('certificados/listado_estudiantes_inscritos') }}">Matrícula</a>
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
</div>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12" id="content">
            <div class="row-fluid">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <h4>Bienvenido</h4>
                    Usted ha iniciado sesión con éxito.</div>
                <div class="navbar">
                    <div class="navbar-inner">
                        <ul class="breadcrumb">
                            <li class="active">Inicio</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <!-- block -->
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
                </div>
                <div class="span6">
                    <!-- block -->
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">TAREA COMUNES (ACCESO RAPIDO)</div>
                        </div>
                        <div class="block-content collapse in">

                        </div>
                    </div>


                </div>
            </div>

            <div class="row-fluid">

                <div class="span4">
                    <!-- block -->
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">DATOS DE INSTITUCIÓN</div>
                        </div>
                        <div class="block-content collapse in">
                            <span class="help-inline" for="inputError" style="color:red;">PERIODO LECTIVO {{ Session::get('periodoNombre') }}</span>
                        </div>
                    </div>
                    <!-- /block -->
                </div>
            </div>
            <div class="row-fluid">
                <div class="span4">
                    <!-- block -->
                    <div class="block">
                        <div class="navbar navbar-inner block-header">
                            <div class="muted pull-left">DATOS DE LA APLICACIÓN</div>
                        </div>
                        <div class="block-content collapse in">

                        </div>
                    </div>
                    <!-- /block -->
                </div>
            </div>
        </div>
    </div>

    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Table with row classes</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="success">
                            <td>1</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr class="error">
                            <td>2</td>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr class="info">
                            <td>3</td>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /block -->
    </div>

    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Bootstrap dataTables</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                        <thead>
                        <tr>
                            <th>Rendering engine</th>
                            <th>Browser</th>
                            <th>Platform(s)</th>
                            <th>Engine version</th>
                            <th>CSS grade</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="odd gradeX">
                            <td>Trident</td>
                            <td>Internet
                                Explorer 4.0</td>
                            <td>Win 95+</td>
                            <td class="center"> 4</td>
                            <td class="center">X</td>
                        </tr>
                        <tr class="even gradeC">
                            <td>Trident</td>
                            <td>Internet
                                Explorer 5.0</td>
                            <td>Win 95+</td>
                            <td class="center">5</td>
                            <td class="center">C</td>
                        </tr>
                        <tr class="odd gradeA">
                            <td>Trident</td>
                            <td>Internet
                                Explorer 5.5</td>
                            <td>Win 95+</td>
                            <td class="center">5.5</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="even gradeA">
                            <td>Trident</td>
                            <td>Internet
                                Explorer 6</td>
                            <td>Win 98+</td>
                            <td class="center">6</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="odd gradeA">
                            <td>Trident</td>
                            <td>Internet Explorer 7</td>
                            <td>Win XP SP2+</td>
                            <td class="center">7</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="even gradeA">
                            <td>Trident</td>
                            <td>AOL browser (AOL desktop)</td>
                            <td>Win XP</td>
                            <td class="center">6</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Firefox 1.0</td>
                            <td>Win 98+ / OSX.2+</td>
                            <td class="center">1.7</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Firefox 1.5</td>
                            <td>Win 98+ / OSX.2+</td>
                            <td class="center">1.8</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Firefox 2.0</td>
                            <td>Win 98+ / OSX.2+</td>
                            <td class="center">1.8</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Firefox 3.0</td>
                            <td>Win 2k+ / OSX.3+</td>
                            <td class="center">1.9</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Camino 1.0</td>
                            <td>OSX.2+</td>
                            <td class="center">1.8</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Camino 1.5</td>
                            <td>OSX.3+</td>
                            <td class="center">1.8</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Netscape 7.2</td>
                            <td>Win 95+ / Mac OS 8.6-9.2</td>
                            <td class="center">1.7</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Netscape Browser 8</td>
                            <td>Win 98SE+</td>
                            <td class="center">1.7</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Netscape Navigator 9</td>
                            <td>Win 98+ / OSX.2+</td>
                            <td class="center">1.8</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Mozilla 1.0</td>
                            <td>Win 95+ / OSX.1+</td>
                            <td class="center">1</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Mozilla 1.1</td>
                            <td>Win 95+ / OSX.1+</td>
                            <td class="center">1.1</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Mozilla 1.2</td>
                            <td>Win 95+ / OSX.1+</td>
                            <td class="center">1.2</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Mozilla 1.3</td>
                            <td>Win 95+ / OSX.1+</td>
                            <td class="center">1.3</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Mozilla 1.4</td>
                            <td>Win 95+ / OSX.1+</td>
                            <td class="center">1.4</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Mozilla 1.5</td>
                            <td>Win 95+ / OSX.1+</td>
                            <td class="center">1.5</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Mozilla 1.6</td>
                            <td>Win 95+ / OSX.1+</td>
                            <td class="center">1.6</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Mozilla 1.7</td>
                            <td>Win 98+ / OSX.1+</td>
                            <td class="center">1.7</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Mozilla 1.8</td>
                            <td>Win 98+ / OSX.1+</td>
                            <td class="center">1.8</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Seamonkey 1.1</td>
                            <td>Win 98+ / OSX.2+</td>
                            <td class="center">1.8</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Gecko</td>
                            <td>Epiphany 2.20</td>
                            <td>Gnome</td>
                            <td class="center">1.8</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Webkit</td>
                            <td>Safari 1.2</td>
                            <td>OSX.3</td>
                            <td class="center">125.5</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Webkit</td>
                            <td>Safari 1.3</td>
                            <td>OSX.3</td>
                            <td class="center">312.8</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Webkit</td>
                            <td>Safari 2.0</td>
                            <td>OSX.4+</td>
                            <td class="center">419.3</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Webkit</td>
                            <td>Safari 3.0</td>
                            <td>OSX.4+</td>
                            <td class="center">522.1</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Webkit</td>
                            <td>OmniWeb 5.5</td>
                            <td>OSX.4+</td>
                            <td class="center">420</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Webkit</td>
                            <td>iPod Touch / iPhone</td>
                            <td>iPod</td>
                            <td class="center">420.1</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Webkit</td>
                            <td>S60</td>
                            <td>S60</td>
                            <td class="center">413</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Presto</td>
                            <td>Opera 7.0</td>
                            <td>Win 95+ / OSX.1+</td>
                            <td class="center">-</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Presto</td>
                            <td>Opera 7.5</td>
                            <td>Win 95+ / OSX.2+</td>
                            <td class="center">-</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Presto</td>
                            <td>Opera 8.0</td>
                            <td>Win 95+ / OSX.2+</td>
                            <td class="center">-</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Presto</td>
                            <td>Opera 8.5</td>
                            <td>Win 95+ / OSX.2+</td>
                            <td class="center">-</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Presto</td>
                            <td>Opera 9.0</td>
                            <td>Win 95+ / OSX.3+</td>
                            <td class="center">-</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Presto</td>
                            <td>Opera 9.2</td>
                            <td>Win 88+ / OSX.3+</td>
                            <td class="center">-</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Presto</td>
                            <td>Opera 9.5</td>
                            <td>Win 88+ / OSX.3+</td>
                            <td class="center">-</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Presto</td>
                            <td>Opera for Wii</td>
                            <td>Wii</td>
                            <td class="center">-</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Presto</td>
                            <td>Nokia N800</td>
                            <td>N800</td>
                            <td class="center">-</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Presto</td>
                            <td>Nintendo DS browser</td>
                            <td>Nintendo DS</td>
                            <td class="center">8.5</td>
                            <td class="center">C/A<sup>1</sup></td>
                        </tr>
                        <tr class="gradeC">
                            <td>KHTML</td>
                            <td>Konqureror 3.1</td>
                            <td>KDE 3.1</td>
                            <td class="center">3.1</td>
                            <td class="center">C</td>
                        </tr>
                        <tr class="gradeA">
                            <td>KHTML</td>
                            <td>Konqureror 3.3</td>
                            <td>KDE 3.3</td>
                            <td class="center">3.3</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeA">
                            <td>KHTML</td>
                            <td>Konqureror 3.5</td>
                            <td>KDE 3.5</td>
                            <td class="center">3.5</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeX">
                            <td>Tasman</td>
                            <td>Internet Explorer 4.5</td>
                            <td>Mac OS 8-9</td>
                            <td class="center">-</td>
                            <td class="center">X</td>
                        </tr>
                        <tr class="gradeC">
                            <td>Tasman</td>
                            <td>Internet Explorer 5.1</td>
                            <td>Mac OS 7.6-9</td>
                            <td class="center">1</td>
                            <td class="center">C</td>
                        </tr>
                        <tr class="gradeC">
                            <td>Tasman</td>
                            <td>Internet Explorer 5.2</td>
                            <td>Mac OS 8-X</td>
                            <td class="center">1</td>
                            <td class="center">C</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Misc</td>
                            <td>NetFront 3.1</td>
                            <td>Embedded devices</td>
                            <td class="center">-</td>
                            <td class="center">C</td>
                        </tr>
                        <tr class="gradeA">
                            <td>Misc</td>
                            <td>NetFront 3.4</td>
                            <td>Embedded devices</td>
                            <td class="center">-</td>
                            <td class="center">A</td>
                        </tr>
                        <tr class="gradeX">
                            <td>Misc</td>
                            <td>Dillo 0.8</td>
                            <td>Embedded devices</td>
                            <td class="center">-</td>
                            <td class="center">X</td>
                        </tr>
                        <tr class="gradeX">
                            <td>Misc</td>
                            <td>Links</td>
                            <td>Text only</td>
                            <td class="center">-</td>
                            <td class="center">X</td>
                        </tr>
                        <tr class="gradeX">
                            <td>Misc</td>
                            <td>Lynx</td>
                            <td>Text only</td>
                            <td class="center">-</td>
                            <td class="center">X</td>
                        </tr>
                        <tr class="gradeC">
                            <td>Misc</td>
                            <td>IE Mobile</td>
                            <td>Windows Mobile 6</td>
                            <td class="center">-</td>
                            <td class="center">C</td>
                        </tr>
                        <tr class="gradeC">
                            <td>Misc</td>
                            <td>PSP browser</td>
                            <td>PSP</td>
                            <td class="center">-</td>
                            <td class="center">C</td>
                        </tr>
                        <tr class="gradeU">
                            <td>Other browsers</td>
                            <td>All others</td>
                            <td>-</td>
                            <td class="center">-</td>
                            <td class="center">U</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /block -->
    </div>

    <hr>
    <footer>
        <div class="pull-right hidden-xs">
            <a href="https://github.com/Jessetl/alice"><b>Sistema María Montessori</b></a>
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2016. Ing. Luis Ugueto, Ing. Cesar Characo, Ing. Jesús Matute</strong>
    </footer>
</div>
<script src="{{ asset('Bootstrap-Admin-Theme-master/vendors/jquery-1.9.1.min.js') }}"></script>
<script src="{{ asset('Bootstrap-Admin-Theme-master/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('Bootstrap-Admin-Theme-master/vendors/easypiechart/jquery.easy-pie-chart.js') }}"></script>
<script src="{{ asset('Bootstrap-Admin-Theme-master/assets/scripts.js') }}"></script>
<script src="{{ asset('Bootstrap-Admin-Theme-master/vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('Bootstrap-Admin-Theme-master/assets/scripts.js') }}"></script>
<script src="{{ asset('Bootstrap-Admin-Theme-master/assets/DT_bootstrap.js') }}"></script>
<script src="{{ asset('js/jquery.shortcuts.min.js') }}"></script>
<script>
    $(function() {
        // Easy pie charts
        $('.chart').easyPieChart({animate: 1000});
    });
</script>
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
    $(document).hotkey('shift+k', function() {
        window.location.href = '/parciales/{{ Auth::user()->id }}';
    });
    $(document).hotkey('ctrl+b', function() {
        window.location.href = '/parciales/mostrarcalificaciones';
    });
</script>
</body>

</html>

