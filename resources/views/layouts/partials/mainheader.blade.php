<!-- Main Header -->
<header class="main-header">
    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>S</b>AMM</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>María Montessori</b></span>
    </a>
    <?php $user = Auth::user()->foto; ?>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">{{ trans('adminlte_lang::message.togglenav') }}</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-group"></i>
                        <span class="label label-success">{{ Session::get('morosos') }}</span>
                    </a>
                    <ul class="dropdown-menu">
                         <li class="header"></li>
                        <li>
                            <!-- Inner Menu: contains the notifications -->
                            <ul class="menu">
                                <li><!-- start notification -->
                                    <a href="#">
                                        <i class="fa fa-users" style="color:black"> Tiene {{ Session::get('morosos') }} Clientes Morosos.</i> 
                                    </a>
                                </li><!-- end notification -->
                            </ul>
                        </li>
                        <li class="footer"><a href="{{ url('morosos') }}">Ver Más</a></li>
                    </ul>
                </li><!-- /.messages-menu -->

                <!-- Notifications Menu -->
                <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-money"></i>


                        <span class="label label-warning">{{ Session::get('valor') }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header"></li>
                        <li>
                            <!-- Inner Menu: contains the notifications -->
                            <ul class="menu">
                                <li><!-- start notification -->
                                    <a href="#">
                                        <i class="fa fa-users" style="color:black"> Tiene {{ Session::get('valor') }} Personales Morosos.</i> 
                                    </a>
                                </li><!-- end notification -->
                            </ul>
                        </li>
                        <li class="footer"><a href="{{ url('/prestamosTotal') }}">Ver Más</a></li>
                    </ul>
                </li>

                @if (Auth::guest())
                    <li><a href="{{ url('/register') }}">{{ trans('adminlte_lang::message.register') }}</a></li>
                    <li><a href="{{ url('/login') }}">{{ trans('adminlte_lang::message.login') }}</a></li>
                @else
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            @if(Auth::user()->foto == '')
                            <img src="{{asset('/img/user2-160x160.jpg')}}" class="user-image" alt="User Image"/>
                            @else

                                <img src="{{asset('perfil/'.$user)}}" class="img-circle" alt="User Image" style="width: 20px; height: 20px; "/>
                                    
                            @endif
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                @if(Auth::user()->foto == '')
                                    <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
                                @else
                                    
                                    <img src="{{asset('perfil/'.$user)}}" class="img-circle" alt="User Image" />
                                    
                                @endif

                                <p>
                                    {{ Auth::user()->name }}
                                    <!-- <small>{{ trans('adminlte_lang::message.login') }} Nov. 2012</small> -->
                                </p>
                            </li>
                            <!-- Menu Body -->
                         <!--<li class="user-body">
                                <div class="col-xs-4 text-center">
                                    <a href="#">{{-- trans('adminlte_lang::message.followers') --}}</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">{{-- trans('adminlte_lang::message.sales') --}}</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">{{-- trans('adminlte_lang::message.friends') --}}</a>
                                </div>
                            </li>-->
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ route('user_perfil.index') }}" class="btn btn-default btn-flat">{{ trans('adminlte_lang::message.profile') }}</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url('/salir') }}" class="btn btn-default btn-flat">{{ trans('adminlte_lang::message.signout') }}</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </nav>
</header>
