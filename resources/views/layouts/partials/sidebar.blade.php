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
            <li><a href="{{ route('usuarios.index') }}"><i class='fa fa-user'></i> <span>Usuarios</span></a></li>
            <li><a href="{{ route('personal.index') }}"><i class='fa fa-user'></i> <span>Personal</span></a></li>
            <li><a href="{{ route('estudiantes.index') }}"><i class='fa fa-user'></i> <span>Estudiantes</span></a></li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Facturaciones</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('rubros/buscar/estudiante') }}">Nuevo</a></li>
                    <li><a href="{{ url('rubros') }}">Listado Total</a></li>
                    <li><a href="#">Listado del Mes Actual</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Préstamos y Anticipos</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('prestamos.create') }}">Nuevo</a></li>
                    <li><a href="{{ url('verificarPrestamos') }}">Verificar Préstamo</a></li>
                    <li><a href="{{ url('/prestamosTotal') }}">Listado Total</a></li>
                    <li><a href="{{ route('prestamos.index') }}">Listado del Mes Actual</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Horarios</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('horarios.index') }}">Nuevo</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Parciales</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('parciales.show',1) }}">Nuevo</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Quimestres</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('quimestres.index') }}">Listado</a></li>
                    <li><a href="{{ route('quimestres.create') }}">Nuevo</a></li>
                </ul>
            </li>
            <!-- <li class="header">{{ trans('adminlte_lang::message.header') }}</li> -->
            <!-- Optionally, you can add icons to the links -->
            <!-- <li class="active"><a href="{{ url('home') }}"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.home') }}</span></a></li> -->
            <!-- <li><a href="#"><i class='fa fa-link'></i> <span>{{ trans('adminlte_lang::message.anotherlink') }}</span></a></li> -->
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>Configuración</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('iess.index') }}">IESS</a></li>
                    <li><a href="{{ route('secciones.index') }}">Secciones</a></li>
                    <li><a href="{{ route('aulas.index') }}">Aulas</a></li>
                    <li><a href="{{ route('cargos.index') }}">Cargos</a></li>
                    <li><a href="{{ route('areas.index') }}">Areas de Trabajo</a></li>
                    <li><a href="{{ route('asignaturas.index') }}">Asignaturas</a></li>
                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
