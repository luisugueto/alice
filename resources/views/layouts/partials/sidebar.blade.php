<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
<?php $user = Auth::user()->foto; ?>
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    @if(Auth::user()->foto == '')
                    <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />

                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                    @else
                    <img src="{{asset('perfil/'.$user)}}" class="img-circle" alt="User Image" />

                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                    @endif
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            @if(Auth::user()->roles_id == 4 || Auth::user()->roles_id == 2 || Auth::user()->roles_id == 1)
            <li class="treeview">
                <a href="#"><i class='fa fa-male'></i> <span>Personal</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('docentes.index') }}">Listado de Docentes</a></li>
                    <li><a href="{{ route('personal.index') }}">Listado del Personal</a></li>
                    <li><a href="{{ route('asistencias.index') }}">Asistencia del Personal</a></li>
                    <li><a href="{{ url('personal/control_de_pagos') }}">Control del Pagos Mensual</a></li>
                </ul>
            </li>
            @endif
            @if(Auth::user()->roles_id == 5 || Auth::user()->roles_id == 2 || Auth::user()->roles_id == 1)
            <li class="treeview">
                <a href="#"><i class='fa fa-child'></i> <span>Estudiantes</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('representantes.cedula') }}">Nuevo</a></li>
                    <li><a href="{{ route('estudiantes.index') }}">Listado</a></li>
                    <li><a href="{{ route('inscripciones.show',[0]) }}">Inscritos</a></li>
                    <li><a href="{{ route('inscripciones.index') }}">Realizar Inscripción</a></li>
                </ul>
            </li>
            @endif
            <!-- @if(Auth::user()->roles_id == 4 || Auth::user()->roles_id == 2 || Auth::user()->roles_id == 1)
            <li class="treeview">
                <a href="#"><i class='fa fa-money'></i> <span>Facturaciones</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('rubros/buscar/estudiante') }}">Nuevo</a></li>
                    <li><a href="{{ url('rubros') }}">Listado Total</a></li>
                    <li><a href="#">Listado del Mes Actual</a></li>
                </ul>
            </li>
            @endif -->
            @if(Auth::user()->roles_id == 4 || Auth::user()->roles_id == 2 || Auth::user()->roles_id == 1)
            <li class="treeview">
                <a href="#"><i class='fa fa-money'></i> <span>Préstamos y Anticipos</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('prestamos.create') }}">Nuevo</a></li>
                    <li><a href="{{ url('verificarPrestamos') }}">Verificar Préstamo</a></li>
                    <li><a href="{{ url('/prestamosTotal') }}">Listado Total</a></li>
                    <li><a href="{{ route('prestamos.index') }}">Listado del Mes Actual</a></li>
                </ul>
            </li>
            @endif
            @if(Auth::user()->roles_id == 5 || Auth::user()->roles_id == 2 || Auth::user()->roles_id == 1)
            <li class="treeview">
                <a href="#"><i class='fa fa-calendar'></i> <span>Horarios</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('horarios.index') }}">Nuevo</a></li>
                </ul>
            </li>
            @endif
            @if(Auth::user()->roles_id == 5 || Auth::user()->roles_id == 3 || Auth::user()->roles_id == 1)
            <li class="treeview">
                <a href="#"><i class='fa fa-list-alt'></i> <span>Parciales</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('parciales.show',1) }}">Nuevo</a></li>
                </ul>
                <ul class="treeview-menu">
                    <li><a href="{{ route('parciales.index') }}">Lista de Estudiantes</a></li>
                </ul>
            </li>
            @endif
            @if(Auth::user()->roles_id == 5 || Auth::user()->roles_id == 1)
            <li class="treeview">
                <a href="#"><i class='fa fa-calendar-o'></i> <span>Quimestres</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('quimestres.index') }}">Listado</a></li>
                    <li><a href="{{ route('quimestres.create') }}">Nuevo</a></li>
                </ul>
            </li>
            @endif
            <!-- <li class="header">{{ trans('adminlte_lang::message.header') }}</li> -->
            <!-- Optionally, you can add icons to the links -->
            <!-- <li class="active"><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li> -->
            <!-- <li><a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.anotherlink') }}</span></a></li> -->
            @if(Auth::user()->roles_id == 5 || Auth::user()->roles_id == 4 || Auth::user()->roles_id == 2 || Auth::user()->roles_id == 1)
            <li class="treeview">
                <a href="#"><i class='fa fa-file-archive-o'></i> <span>Certificados</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    @if(Auth::user()->roles_id == 5 || Auth::user()->roles_id == 2 || Auth::user()->roles_id == 1)
                    <li><a href="{{ url('certificados/listado_estudiantes_inscritos') }}">Matrícula</a></li>
                    @endif
                  
                </ul>
            </li>
            @endif
            @if(Auth::user()->roles_id == 5 || Auth::user()->roles_id == 4 || Auth::user()->roles_id == 2 || Auth::user()->roles_id == 1)
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Configuración</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    @if(Auth::user()->roles_id == 4)
                    <li><a href="{{ route('iess.index') }}">IESS</a></li>
                    @endif
                    @if(Auth::user()->roles_id == 4 || Auth::user()->roles_id == 2 || Auth::user()->roles_id == 1)
                    <li><a href="{{ route('secciones.index') }}">Secciones</a></li>
                    @endif
                    @if(Auth::user()->roles_id == 5 || Auth::user()->roles_id == 2 || Auth::user()->roles_id == 1)
                    <li><a href="{{ route('aulas.index') }}">Aulas</a></li>
                    @endif
                    @if(Auth::user()->roles_id == 5 || Auth::user()->roles_id == 2 || Auth::user()->roles_id == 1 )
                    <li><a href="{{ route('cargos.index') }}">Cargos</a></li>
                    @endif
                    @if(Auth::user()->roles_id == 4 || Auth::user()->roles_id == 1)
                    <li><a href="{{ route('areas.index') }}">Areas</a></li>
                    @endif
                    @if(Auth::user()->roles_id == 5 || Auth::user()->roles_id == 1)
                    <li><a href="{{ route('asignaturas.index') }}">Asignaturas</a></li>
                    @endif
                    @if(Auth::user()->roles_id == 5 || Auth::user()->roles_id == 1)
                    <li><a href="{{ route('rubros.index') }}">Rubros</a></li>
                    @endif
                     @if(Auth::user()->roles_id == 4 || Auth::user()->roles_id == 1)
                    <li><a href="{{ route('usuarios.index') }}"> Usuarios</a></li>
                    <li><a href="{{ route('tipo_empleado.index') }}">Tipo de Empleado</a></li>
                    @endif
                </ul>
            </li>
            @endif
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
